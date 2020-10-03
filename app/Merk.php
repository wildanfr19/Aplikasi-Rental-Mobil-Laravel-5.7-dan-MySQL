<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = "merk";
    protected $fillable = ['merk'];


    public function mobil()
    {
    	return $this->hasOne(Mobil::class, 'id_merk','id');
    }

    
}
