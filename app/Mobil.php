<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = "mobil";
    protected $fillable = [
    	'nama',
    	'warna',
    	'no_polisi',
    	'jumlah_kursi',
    	'tahun_beli',
    	'gambar',
    	'id_merk'
    ];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk','id');
    }

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'id_mobil','id');
    } 
}
