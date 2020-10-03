<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $table = "Perjalanan";
    protected $fillable = [
    	'asal',
    	'tujuan',
    	'jarak'
    ];
    public function pesanan(){
    	return $this->hasMany(Pesanan::class, 'id_perjalanan','id');
    } 
}
