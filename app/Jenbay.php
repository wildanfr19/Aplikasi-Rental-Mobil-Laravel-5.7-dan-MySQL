<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenbay extends Model
{
    protected $table = "jenis_bayar";
    protected $fillable = ['jenis_bayar'];


    public function pesanan(){
    	return $this->hasMany(Pesanan::class, 'id_jenis_bayar','id');
    } 
}
