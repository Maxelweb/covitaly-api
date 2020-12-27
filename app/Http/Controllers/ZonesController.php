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

    public function provideData() 
    {
        $x = new DataGetterController();
        var_dump($x->saveDataToStorage());
        return DataGetterController::getDataFromStorage();
    }

    public function showAllCurrentZones()
    {
        $data = $this->provideData();
        return empty($data) ? response('Not found (data currently unavailable, retry soon)', 404) : response()->json($data, 200);
    }

    public function showASingleZone(String $region)
    {
        $data = $this->provideData();
        if(empty($data))
            return response('Not found (data currently unavailable, retry soon)', 404);
        
        if(isset($data[$region])) 
            return response()->json(array(strtolower($region) => $data[$region]), 200);
        else
            return response('Not found (no region found with that name)', 404);

    }

    public function showZonesGroupedByStatus() 
    {
        $data = $this->provideData();
        if(empty($data))
            return response('Not found (data currently unavailable, retry soon)', 404);

            $groups = array();
            foreach ($this->STATUS_DEFAULT as $status) {
                $groups[$status] = $this->getZonesWithSameStatus($status, $data);
            }

            return response()->json($groups, 200);
    }

}
