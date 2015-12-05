<?php namespace App\Http\Controllers;

use App\Photo;
use App\School;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use File;

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

        if(Input::has('images')) {
            $files = Input::file('images');
            foreach($files as $file) {
                $destinationPath = 'uploads';
                $filename = $file->getClientOriginalName();
                $new_name = uniqid().".".File::extension($filename);
                $upload_success = $file->move(public_path()."/".$destinationPath, $new_name);
                $uploaded_files[] = $destinationPath."/".$new_name;
            }

            foreach($uploaded_files as $file) {
                $photo = new Photo;
                $photo->school_id = $school->id;
                $photo->location = $file;

                $photo->save();
            }
        }

        Session::flash('success', 'Izmena je sacuvana');
        return redirect(url('admin/school/'.$school->id));
    }
}