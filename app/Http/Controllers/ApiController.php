<?php namespace App\Http\Controllers;

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
}