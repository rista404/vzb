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