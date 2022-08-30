<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use App\Jemaat;

class PelayanGereja extends Model
{
    //
    protected $table = "pelayan_gereja";

    public function jemaat(){
        return $this->belongsTo('App\Jemaat',"nik", "nik");
    }
}
