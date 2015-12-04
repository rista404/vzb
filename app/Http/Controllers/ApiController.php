<?php namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class ApiController extends Controller {

    public function getSchools() {
        $schools = School::all();

        return $schools;
    }

    public function getSchool($id) {
        $school = School::find($id);

        return $school;
    }
}