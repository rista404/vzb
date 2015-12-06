<?php namespace App\Http\Controllers;

use App\Dorm;
use App\Event;
use App\Faq;
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
                    $tip = "Umetnost";
                    break;
                case 'tehnicke':
                    $tip = "Tehničko-tehnološke nauke";
                    break;
                case 'prirodne':
                    $tip = "Prirodno-matematičke nauke";
                    break;
                case 'drustvene':
                    $tip = "Društveno-humanističke nauke";
                    break;
                case 'medicinske':
                    $tip = "Medicinske nauke";
                    break;
            }

            if($tip == "") {
                return abort(404);
            }

            foreach($schools as $key => $school) {
                if($type == "drustvene" && $school->id == '9') {
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
        $organizations = Organization::all();

        return $organizations;
    }

    public function getOrganization($id) {
        $organization = Organization::find($id);

        return $organization;
    }

    public function getEvents() {
        $events = Event::all();

        return $events;
    }

    public function getEvent($id) {
        $event = Event::find($id);

        return $event;
    }

    public function getFaqs() {
        $faqs = Faq::all();

        return $faqs;
    }

    public function getFaq($id) {
        $faq = Faq::find($id);

        return $faq;
    }
}