<?php

namespace App\Http\Controllers\Pesantren;

use App\FotoPesantren;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesantren;
use App\Potential;
use App\Province;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
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

    public function tampilkan(Request $request) {

        $keyword = $request->keyword;
        $provinsiid = $request->prov;

        $pesantren = DB::table('pesantren')
        ->where('nama', 'like', "%".$keyword."%")
        ->where('provinsiid', '=', $provinsiid)
        ->get();

        $pesantrenview = DB::table('pesantren')
        ->where('nama', 'like', "%".$keyword."%")
        ->where('provinsiid', '=', $provinsiid)
        ->select('pesantren.id as p_id', 'pesantren.nama', 'province.name')
        ->join('province', 'pesantren.provinsiid', '=', 'province.id')
        ->get();

        $img = [];
        foreach ($pesantren as $p) {
            $strtemp = DB::table('foto_pesantren')->where("pesantrenid", '=', $p->id)->first()->img;
            array_push($img, $strtemp);
        }

        $provinsi = Province::get();
        // $potensi = Potential::get();

        return view('pesantren', ['pesantren'=>$pesantrenview, 'img'=>$img, 'provinsi'=>$provinsi]);
    }
}
