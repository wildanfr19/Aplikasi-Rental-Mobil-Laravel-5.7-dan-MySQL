<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    protected $table = "pemesan";
    protected $fillable = [
    	'nama',
    	'alamat',
    	'jenis_kelamin',
    	'foto'
    ];

   public function pesanan(){
   	return $this->hasMany(Pesanan::class, 'id_pemesan','id');
   } 
}
