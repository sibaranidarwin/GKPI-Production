<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sektor extends Model
{
    //
    protected $table = "sektor";

    public function jemaat(){
        return $this->hasMany("App\Jemaat", "sektor_id");
    }
}
