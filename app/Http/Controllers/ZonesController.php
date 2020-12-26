<?php

namespace App\Http\Controllers;

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

    private function provideData() 
    {
        $zones = [];
        $data = file_get_contents(env('APP_URLGOVMAP'));
        preg_match('/<div class="col-md-6 contenitore_svg">(.*?)<\/div>/s', $data, $match);

        if(empty($match))
            return $zones;

        preg_match('/<svg/s', $match[0], $matchMap);

        if(empty($matchMap))
            return $zones;

        preg_match_all('/onclick="(.*?)\(\'(.*?)\'\)"/is', $match[0], $regions);   
        
        $zones = array_combine($regions[1], $regions[2]);

        /*
        for($i = 0; $i < count($regions[1]); $i++){
            $zones[$i]['name'] = $regions[1][$i];
            $zones[$i]['status'] = $this->convertStatusName($regions[2][$i]);
        }*/

        foreach($zones as $zone => &$val) {
            $val = $this->convertStatusName($val);
        }

        return $zones;
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
