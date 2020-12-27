<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DataGetterController;


class ZonesController extends Controller
{
    var array $STATUS_DEFAULT = ['yellow', 'orange', 'red', 'undefined'];

    private function getZonesWithSameStatus(String $status, array $data) {
        $zones = [];
        foreach ($data as $zone => $val) {
            if($val == $status)
                $zones[] = $zone;            
        }
        return $zones;
    }

    private function convertStatusName(String $status) {
        switch ($status) {
            case 'rosso':
                return 'red';
            case 'giallo':
                return 'yellow';
            case 'arancione':
                return 'orange';
            default:
                return 'undefined';
                break;
        }
    }

    private function provideData(bool $array_assoc=false) 
    {
        //$x = new DataGetterController();
        //$x->saveDataToStorage();
        return DataGetterController::getDataFromStorage($array_assoc);
    }

    public function showAllCurrentZones()
    {
        $data = $this->provideData(true);
        return empty($data) ? response('Not found (data currently unavailable)', 404) : response()->json($data, 200);
    }

    public function showASingleZone(String $region)
    {
        $data = $this->provideData();
        if(empty($data))
            return response('Not found (data currently unavailable)', 404);
        
        if(isset($data->zones_status->$region)) {
            $data->zone_status = (object) array(strtolower($region) => $data->zones_status->$region);
            unset($data->zones_status);
            return response()->json((array) $data, 200);
        }
        
        return response('Not found (no region found with that name)', 404);
        
    }

    public function showZonesGroupedByStatus() 
    {
        $data = $this->provideData(true);
        if(empty($data))
            return response('Not found (data currently unavailable)', 404);

        $groups = array();
        foreach ($this->STATUS_DEFAULT as $status) {
            $groups[$status] = $this->getZonesWithSameStatus($status, $data['zones_status']);
        }
        unset($data['zones_status']);
        $data['status_zones'] = $groups;
        return response()->json($data, 200);
    }

}
