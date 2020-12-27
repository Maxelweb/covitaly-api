<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DataGetterController extends Controller
{
    static $STATUS_DEFAULT = ['yellow', 'orange', 'red', 'undefined'];

    public function convertStatusName(String $status) {
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

    private function getExternalData() 
    {
        $zones = [];
        $data = file_get_contents("https://web.archive.org/web/20201215173120/http://www.governo.it/it/articolo/domande-frequenti-sulle-misure-adottate-dal-governo/15638/"/*env('APP_URLGOVMAP')*/);
        preg_match('/<div class="col-md-6 contenitore_svg">(.*?)<\/div>/s', $data, $match);

        if(empty($match))
            return [];

        preg_match('/<svg/s', $match[0], $matchMap);

        if(empty($matchMap))
            return [];

        preg_match_all('/onclick="(.*?)\(\'(.*?)\'\)"/is', $match[0], $regions);   
        
        $zones = array_combine($regions[1], $regions[2]);

        foreach($zones as $zone => &$val) {
            $val = $this->convertStatusName($val);
        }

        $formatted['last_update'] = Carbon::now("Europe/Rome")->toDateTimeString();
        $formatted['zones_status'] = $zones;

        return $formatted;
    }

    public function saveDataToStorage() {
        
        $res = $this->getExternalData();
        var_dump($res);
        if(!empty($res)){
            Storage::disk('local')->put('latest_zones_update.json', $res);
            return true;
        } 

        return false;
    }

    static public function getDataFromStorage() {
        if(Storage::disk('local')->exist('latest_zones_update.json'))
            return Storage::disk('local')->get('latest_zones_update.json');
    }
}
