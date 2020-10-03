<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Pemesan;
use App\Mobil;
use App\Perjalanan;
use App\Jenbay;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pesanan = Pesanan::count();
        $pemesan = Pemesan::count();
        $mobil = Mobil::count();
        $perjalanan = Perjalanan::count();
        $jenbay = Jenbay::count();
        return view('home', compact('pesanan','pemesan','mobil','perjalanan','jenbay'));
    }
}
