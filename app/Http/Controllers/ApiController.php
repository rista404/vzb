<?php namespace App\Http\Controllers;

use App\Dorm;
use App\Organization;
use App\School;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Cache;

class ApiController extends Controller {

    public function getSchools() {
        $schools = School::takeAll();

        return $schools;
    }

    public function getSchoolByType($type) {
        $schools = School::takeAll();

        if($type == 'strukovne') {
            foreach($schools as $key => $school) {
                if($school->univerzitet != "") {
                    unset($schools[$key]);
                }
            }
        }
        else {
            $tip = "";
            switch($type) {
                case 'umetnost':
                    $tip = "Уметност";
                    break;
                case 'tehnicke':
                    $tip = "Техничко-технолошке науке";
                    break;
                case 'prirodne':
                    $tip = "Природно-математичке науке";
                    break;
                case 'drustvene':
                    $tip = "Друштвено-хуманистичке науке";
                    break;
                case 'medicinske':
                    $tip = "Медицинске науке";
                    break;
            }

            if($tip == "") {
                return abort(404);
            }

            foreach($schools as $key => $school) {
                if($type = "drustvene" && $school->id = '9') {
                    continue;
                }

                if($school->polje != $tip) {
                    unset($schools[$key]);
                }
            }
        }

        return $schools;
    }

    public function getSchoolByEspb($espb) {
        $schools = School::takeAll();

        foreach($schools as $key => $school) {
            if(!in_array($espb, $school->trajanje)) {
                unset($schools[$key]);
            }
        }

        return $schools;
    }

    public function getSchool($id) {
        $school = School::takeOne($id);

        return $school;
    }

    public function getDorms() {
        $dorms = Dorm::all();

        return $dorms;
    }

    public function getDorm($id) {
        $dorm = Dorm::find($id);

        return $dorm;
    }

    public function getOrganizations() {
        $dorms = Organization::all();

        return $dorms;
    }

    public function getOrganization($id) {
        $dorm = Organization::find($id);

        return $dorm;
    }
}