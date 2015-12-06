<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use Cache;

class School extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

    public function photos() {
        return $this->hasMany('App\Photo', 'school_id', 'id');
    }

    public static function takeAll() {
        $schools = self::getCached();

        return $schools;
    }

    public static function takeOne($id) {
        $schools = self::getCached();

        foreach ($schools as $school) {
            if($school->id = $id)
                return json_encode($school);
        }
    }

    public static function getCached() {
        if (Cache::has('schools')) {
            $schools = Cache::get('schools');
        }
        else {
            $schools = self::storeSchoolsInCache();
        }

        return $schools;
    }

    private static function storeSchoolsInCache() {
        $client = new Client;

        $res = $client->request("GET", "http://opendata.mpn.gov.rs/1337/get.php?dataset=vsustanove2016&lang=en&term=json");
        $schools = json_decode($res->getBody());

        $res = $client->request("GET", "http://opendata.mpn.gov.rs/1337/get.php?dataset=sprogrami2016&lang=en&term=json");
        $study_programs = json_decode($res->getBody());

        foreach ($schools as $key=>$school){
            if (!self::isInBelgrade($school->univerzitet, $school->nazivu) || self::notNeeded($school->id)) {
                unset($schools[$key]);
                continue;
            }

            //Convert from cyrilic to latin
            $school->nazivu = self::cyrilicToLatin($school->nazivu);
            $school->univerzitet = self::cyrilicToLatin($school->univerzitet);
            $school->adresa = self::cyrilicToLatin($school->adresa);
            $school->dekan = self::cyrilicToLatin($school->dekan);

            $school_from_db = School::where("id", $school->id)->first();
            if($school_from_db != null) {
                $schools[$key]->bus = $school_from_db->bus;

                $photos = [];
                foreach ($school_from_db->photos as $photo) {
                    $photos[]['location'] = $photo->location;
                }
                $schools[$key]->photos = $photos;
            }

            $school->study_programs = [];
            $school->trajanje = [];
            foreach ($study_programs as $study_program) {
                if($study_program->id == $school->id) {
                    $school->study_programs[] = [
                        'naziv' => self::cyrilicToLatin($study_program->naziv),
                        'nivo' => self::cyrilicToLatin($study_program->nivo),
                        'trajanje' => self::cyrilicToLatin($study_program->trajanje),
                        'polje' => self::cyrilicToLatin($study_program->polje),
                        'zvanje' => self::cyrilicToLatin($study_program->zvanje),
                        'skolarina' => self::cyrilicToLatin($study_program->skolarina)
                    ];
                    $school->polje = self::cyrilicToLatin($study_program->polje);

                    if(!in_array($study_program->trajanje, $school->trajanje)){
                        $school->trajanje[] = $study_program->trajanje;
                    }
                }
            }

        }


        //Store in cache for 7 days
        Cache::remember('schools', 10080, function() use ($schools) {
            return $schools;
        });

        return array_values($schools);
    }

    public static function isInBelgrade($univerzitet, $naziv = "") {
        if(strpos($univerzitet,'Београд') !== false || ($univerzitet == "" && strpos($naziv,'Београд') !== false)) {
            return true;
        }

        return false;
    }

    public static function notNeeded($id) {
        $notNeededIDs = [
            '145', '153'
        ];

        if(in_array($id,$notNeededIDs)) {
            return true;
        }

        return false;
    }

    public static function cyrilicToLatin($text) {
        $replace = [
            "А" => "A",
            "Б" => "B",
            "В" => "V",
            "Г" => "G",
            "Д" => "D",
            "Ђ" => "Đ",
            "Е" => "E",
            "Ж" => "Ž",
            "З" => "Z",
            "И" => "I",
            "Ј" => "J",
            "К" => "K",
            "Л" => "L",
            "Љ" => "LJ",
            "М" => "M",
            "Н" => "N",
            "Њ" => "NJ",
            "О" => "O",
            "П" => "P",
            "Р" => "R",
            "С" => "S",
            "Ш" => "Š",
            "Т" => "T",
            "Ћ" => "Ć",
            "У" => "U",
            "Ф" => "F",
            "Х" => "H",
            "Ц" => "C",
            "Ч" => "Č",
            "Џ" => "DŽ",
            "Ш" => "Š",
            "а" => "a",
            "б" => "b",
            "в" => "v",
            "г" => "g",
            "д" => "d",
            "ђ" => "đ",
            "е" => "e",
            "ж" => "ž",
            "з" => "z",
            "и" => "i",
            "ј" => "j",
            "к" => "k",
            "л" => "l",
            "љ" => "lj",
            "м" => "m",
            "н" => "n",
            "њ" => "nj",
            "о" => "o",
            "п" => "p",
            "р" => "r",
            "с" => "s",
            "ш" => "š",
            "т" => "t",
            "ћ" => "ć",
            "у" => "u",
            "ф" => "f",
            "х" => "h",
            "ц" => "c",
            "ч" => "č",
            "џ" => "dž",
            "ш" => "š",
            "Ња" => "Nja",
            "Ње" => "Nje",
            "Њи" => "Nji",
            "Њо" => "Njo",
            "Њу" => "Nju",
            "Ља" => "Lja",
            "Ље" => "Lje",
            "Љи" => "Lji",
            "Љо" => "Ljo",
            "Љу" => "Lju",
            "Џа" => "Dža",
            "Џе" => "Dže",
            "Џи" => "Dži",
            "Џо" => "Džo",
            "Џу" => "Džu",
            ".срб" => ".срб",
            "иѕ.срб" => "иѕ.срб",
            "њњњ.из.срб" => "њњњ.из.срб",
            ".СРБ" => ".СРБ",
            "ИЗ.СРБ" => "ИЗ.СРБ",
            "ЊЊЊ.ИЗ.СРБ" => "ЊЊЊ.ИЗ.СРБ"
        ];

        return strtr($text, $replace);
    }
}
