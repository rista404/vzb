<?php namespace App\Http\Controllers;

use App\Dorm;
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

        if(Input::hasFile('images')) {
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

        return redirect(url('admin/school/'.$school->id))->with('success', 'Izmena je sacuvana');
    }

    public function deletePhoto($id) {
        $photo = Photo::find($id);

        $photo->delete();

        return redirect(url('admin/school/'.$photo->school_id))->with('success', 'Slika je obrisana');;
    }

    public function getDorms() {
        $dorms = Dorm::all();

        return view("admin/dorms")
            ->with("dorms", $dorms);
    }

    public function getDorm($id) {
        $dorm = Dorm::find($id);

        return view("admin/edit_dorm")
            ->with("dorm", $dorm);
    }

    public function editDorm($id, Request $request) {
        $dorm = Dorm::find($id);

        $dorm->name = $request->input('name');
        $dorm->location = $request->input('location');
        $dorm->description = $request->input('description');

        $dorm->save();

        return redirect(url("admin/dorm/".$dorm->id))->with("success", "Dom je izmenjen.");
    }

    public function addDorm() {
        return view("admin/add_dorm");
    }

    public function saveDorm(Request $request) {
        $dorm = new Dorm;

        $dorm->name = $request->input('name');
        $dorm->location = $request->input('location');
        $dorm->description = $request->input('description');

        $dorm->save();

        return redirect("admin/dorms")->with("success", "Dom je sacuvan.");
    }

    public function deleteDorm($id) {
        $dorm = Dorm::find($id);

        $dorm->delete();

        return redirect("admin/dorms")->with("success", "Dom je obrisan.");
    }
}