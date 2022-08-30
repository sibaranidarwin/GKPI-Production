<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporankeuangankeluarga extends Model
{
    protected $table = "keuangan_keluarga";
    protected $guarded = [];

    public function bulan(){
        return $this->belongsTo("App\bulan", "bulan_id", "id");
    }
}
