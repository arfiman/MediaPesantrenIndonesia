<?php

namespace App\Http\Controllers;

use App\FotoPesantren;
use App\Pesantren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pesantren = DB::table('pesantren')
        ->take(3)
        ->get();

        $pesantrenview = DB::table('pesantren')
        ->select('pesantren.id as p_id', 'pesantren.nama', 'province.name')
        ->take(3)
        ->join('province', 'pesantren.provinsiid', '=', 'province.id')
        ->get();

        $img = [];
        foreach ($pesantren as $p) {
            $strtemp = DB::table('foto_pesantren')->where("pesantrenid", '=', $p->id)->first()->img;
            array_push($img, $strtemp);
        }
        return view('home', ['pesantren'=>$pesantrenview, 'img'=>$img]);
    }
}
