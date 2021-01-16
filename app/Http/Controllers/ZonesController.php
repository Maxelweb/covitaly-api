<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DataGetterController;


class ZonesController extends Controller
{
    var array $STATUS_DEFAULT = ['yellow', 'orange', 'red', 'white', 'undefined'];

    private function getZonesWithSameStatus(String $status, array $data) {
        $zones = [];
        foreach ($data as $zone => $val) {
            if($val == $status)
                $zones[] = $zone;            
        }
        return $zones;
    }

    private function provideData(bool $array_assoc=false) 
    {
        return DataGetterController::getDataFromStorage($array_assoc);
    }

    /**
     * zones/
     *
     * This endpoint allows you to see the color status of all available zones/regions in Italy.
     * <aside class="info">Status could be one of the following: <code>red, orange, yellow, white, undefined</code></aside>
     */
    public function showAllCurrentZones()
    {
        $data = $this->provideData(true);
        return empty($data) ? response('Not found (data currently unavailable)', 404) : response()->json($data, 200);
    }

    /**
     * zones/{region}
     *
     * This endpoint allows you to see to get a single region status by name.
     * <aside class="info">Status could be one of the following: <code>red, orange, yellow, undefined</code></aside>
     */
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

    /**
     * status/
     *
     * This endpoint allows you to group the regions in Italy by the current status.
     * <aside class="info">Status could be one of the following: <code>red, orange, yellow, white, undefined</code></aside>
     */
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
