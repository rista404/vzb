<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

    public function photo() {
        return $this->hasMany('App\Photo', 'school_id', 'id');
    }
}
