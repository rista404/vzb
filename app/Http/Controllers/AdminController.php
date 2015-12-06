<?php namespace App\Http\Controllers;

use App\Dorm;
use App\Event;
use App\Organization;
use App\Photo;
use App\School;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Session;
use File;
use Auth;

class AdminController extends Controller {

    protected $whitelist = [];

    public function __construct()
    {
        $this->middleware('auth', array('except' => $this->whitelist));
    }

    public function index() {
        return redirect("admin/schools");
    }

    //School Functions
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

    // Dorms functions
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

    // Organizations functions
    public function getOrganizations() {
        $organizations = Organization::all();

        return view("admin/organizations")
            ->with("organizations", $organizations);
    }

    public function getOrganization($id) {
        $organization = Organization::find($id);

        return view("admin/edit_organization")
            ->with("organization", $organization);
    }

    public function editOrganization($id, Request $request) {
        $organization = Organization::find($id);

        $organization->name = $request->input('name');
        $organization->contact = $request->input('contact');
        $organization->description = $request->input('description');

        $organization->save();

        return redirect(url("admin/organization/".$organization->id))->with("success", "Organizacija je izmenjena.");
    }

    public function addOrganization() {
        return view("admin/add_organization");
    }

    public function saveOrganization(Request $request) {
        $organization = new Organization;

        $organization->name = $request->input('name');
        $organization->contact = $request->input('contact');
        $organization->description = $request->input('description');

        $organization->save();

        return redirect("admin/organizations")->with("success", "Organizacija je sacuvana.");
    }

    public function deleteOrganization($id) {
        $organization = Organization::find($id);

        $organization->delete();

        return redirect("admin/organizations")->with("success", "Organizacija je obrisana.");
    }

    // Events functions
    public function getEvents() {
        $events = Event::all();

        return view("admin/events")
            ->with("events", $events);
    }

    public function getEvent($id) {
        $event = Event::find($id);

        return view("admin/edit_event")
            ->with("event", $event);
    }

    public function editEvent($id, Request $request) {
        $event = Event::find($id);

        $user = Auth::user();

        $event->name = $request->input('name');
        $event->user_id = $user->id;
        $event->time_date = $request->input('time_date');
        $event->location = $request->input('location');
        $event->description = $request->input('description');

        $event->save();

        return redirect(url("admin/event/".$event->id))->with("success", "Dogadjaj je izmenjen.");
    }

    public function addEvent() {
        return view("admin/add_event");
    }

    public function saveEvent(Request $request) {
        $event = new Event;

        $user = Auth::user();

        $event->name = $request->input('name');
        $event->user_id = $user->id;
        $event->time_date = $request->input('time_date');
        $event->location = $request->input('location');
        $event->description = $request->input('description');

        $event->save();

        return redirect("admin/events")->with("success", "Dogadjaj je sacuvan.");
    }

    public function deleteEvent($id) {
        $event = Event::find($id);

        $event->delete();

        return redirect("admin/events")->with("success", "Dogadjaj je obrisan.");
    }
}