<?php namespace App\Http\Controllers;

use App\School;

class AdminController extends Controller {

    protected $whitelist = [];

    public function __construct()
    {
        $this->middleware('auth', array('except' => $this->whitelist));
    }

    public function index() {
        return redirect("admin/schools");
    }

    public function getSchools() {
        $schools = School::all();

        return view("admin/schools")
            ->with("schools", $schools);
    }

    public function getSchool($id) {
        $school = School::find($id);

        return view("admin/edit_school")
            ->with("school", $school);
    }

    public function editSchool($id) {
        $school = School::find($id);

        return view("admin/edit_school")
            ->with("school", $school);
    }
}