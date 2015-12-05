<?php namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

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

    public function editSchool($id, Request $request) {
        $school = School::find($id);

        $school->bus = $request->input('bus');

        $school->save();

        return view("admin/edit_school")
            ->with("school", $school)
            ->with('success', "Izmena je sacuvana");
    }
}