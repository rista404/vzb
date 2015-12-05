<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Cache;

class School extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

    public function photos() {
        return $this->hasMany('App\Photo', 'school_id', 'id');
    }

    public static function takeAll() {
        if (Cache::has('schools')) {
            $schools = Cache::get('schools');
        }
        else {
            $schools = self::storeSchoolsInCache();
        }

        return $schools;
    }

    private static function storeSchoolsInCache() {
        $client = new Client;

        $res = $client->request("GET", "http://opendata.mpn.gov.rs/1337/get.php?dataset=vsustanove2016&lang=en&term=json");

        $schools = json_decode($res->getBody());

        $schools_from_db = self::where('id', 153)->with('photos')->get();

        foreach ($schools as $key=>$school){
            foreach ($schools_from_db as $key_db=>$school_from_db){
                if(!self::isInBelgrade($school->univerzitet, $school->nazivu)) {
                    unset($schools[$key]);
                    continue;
                }

                if($school->id == $school_from_db->id) {
                    $schools[$key]->bus = $school_from_db->bus;

                    $photos = [];
                    foreach ($school_from_db->photos as $photo) {
                        $photos[]['location'] = $photo->location;
                    }
                    $schools[$key]->photos = $photos;
                }
            }
        }

        //Store in cache for 7 days
        $cached_schools = Cache::remember('schools', 10080, function() use ($schools) {
            return $schools;
        });

        return $cached_schools;
    }

    private static function isInBelgrade($univerzitet, $naziv = "") {
        if(strpos($univerzitet,'Београд') !== false || ($univerzitet == "" && strpos($naziv,'Београд') !== false)) {
            return true;
        }

        return false;
    }
}
