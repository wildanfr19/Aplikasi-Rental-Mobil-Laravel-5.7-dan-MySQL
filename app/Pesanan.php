<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = "pesanan";
    protected $fillable = [
    	'harga',
    	'tgl_pinjam',
    	'tgl_kembali',
    	'id_pemesan',
    	'id_mobil',
    	'id_perjalanan',
    	'id_jenis_bayar'
    ];

    public function pemesan(){
    	return $this->belongsTo(Pemesan::class, 'id_pemesan','id');
    }

    public function mobil(){
    	return $this->belongsTo(Mobil::class, 'id_mobil','id');
    }
    public function perjalanan(){
    	return $this->belongsTo(Perjalanan::class, 'id_perjalanan','id');
    }

    public function jenbay(){
    	return $this->belongsTo(Jenbay::class, 'id_jenis_bayar','id');
    }
}
