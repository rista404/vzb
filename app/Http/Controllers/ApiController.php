<?php namespace App\Http\Controllers;

use App\School;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller {

    public function getSchools() {
        $client = new Client;

        $res = $client->request("GET", "http://opendata.mpn.gov.rs/1337/get.php?dataset=vsustanove2016&lang=en&term=json");

        $schools = json_decode($res->getBody());

        $schools_from_db = School::where('id', 153)->with('photos')->get();

        foreach ($schools as $key=>$school){
            foreach ($schools_from_db as $key_db=>$school_from_db){
                if(!$this->isInBelgrade($school->univerzitet, $school->nazivu)) {
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

        return $schools;
    }

    public function getSchool($id) {
        $school = School::find($id);

        return $school;
    }

    private function isInBelgrade($univerzitet, $naziv = "") {
        if(strpos($univerzitet,'Београд') !== false || ($univerzitet == "" && strpos($naziv,'Београд') !== false)) {
            return true;
        }

        return false;
    }
}