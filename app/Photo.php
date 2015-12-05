<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photos';

    public function school() {
        return $this->belongsTo('App\School', 'id', 'school_id');
    }
}
