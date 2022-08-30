<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bulan extends Model
{
    //
    protected $table = "bulan";

    public function laporankeuangankeluarga(){
        return $this->hasMany("App\laporankeuangankeluarga", "bulan_id");
    }
}
