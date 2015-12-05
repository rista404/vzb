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
        $schools = self::getCached();

        return $schools;
    }

    public static function takeOne($id) {
        $schools = self::getCached();

        foreach ($schools as $school) {
            if($school->id = $id)
                return json_encode($school);
        }
    }

    public static function getCached() {
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

        $res = $client->request("GET", "http://opendata.mpn.gov.rs/1337/get.php?dataset=sprogrami2016&lang=en&term=json");
        $study_programs = json_decode($res->getBody());

        foreach ($schools as $key=>$school){
            if (!self::isInBelgrade($school->univerzitet, $school->nazivu)) {
                unset($schools[$key]);
                continue;
            }

            $school_from_db = School::where("id", $school->id)->first();
            if($school_from_db != null) {
                $schools[$key]->bus = $school_from_db->bus;

                $photos = [];
                foreach ($school_from_db->photos as $photo) {
                    $photos[]['location'] = $photo->location;
                }
                $schools[$key]->photos = $photos;
            }

            $school->study_programs = [];
            foreach ($study_programs as $study_program) {
                if($study_program->id == $school->id) {
                    $school->study_programs[] = [
                        'naziv' => $study_program->naziv,
                        'nivo' => $study_program->nivo,
                        'trajanje' => $study_program->trajanje,
                        'polje' => $study_program->polje,
                        'zvanje' => $study_program->zvanje,
                        'skolarina' => $study_program->skolarina,
                    ];
                }
            }
        }


        //Store in cache for 7 days
        Cache::remember('schools', 10080, function() use ($schools) {
            return $schools;
        });

        return $schools;
    }

    private static function isInBelgrade($univerzitet, $naziv = "") {
        if(strpos($univerzitet,'Београд') !== false || ($univerzitet == "" && strpos($naziv,'Београд') !== false)) {
            return true;
        }

        return false;
    }
}
