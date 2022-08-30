<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use App\Jemaat;

class Administrasi extends Model
{
    //
    protected $table = "administrasi";
    protected $fillable = ['nik'];

    public function jemaat(){
        return $this->belongsTo('App\Jemaat',"nik", "nik");
    }
}
