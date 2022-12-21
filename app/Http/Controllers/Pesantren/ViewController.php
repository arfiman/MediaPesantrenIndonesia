<?php

namespace App\Http\Controllers\Pesantren;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $img = DB::table('foto_pesantren')
        ->select('pesantrenid', DB::raw('MAX(img) as img'))
        ->groupBy('pesantrenid');

        if($provinsiid == null){

            $pesantrenview = DB::table('pesantren')
            ->where('nama', 'like', "%".$keyword."%")
            ->select('pesantren.id as p_id', 'pesantren.nama', 'province.name', 'img')
            ->join('province', 'pesantren.provinsiid', '=', 'province.id')
            ->leftJoinSub($img, 'img', function($join){
                $join->on('pesantren.id', '=', 'img.pesantrenid');
            })
            ->paginate(9);
        } else {

            $pesantrenview = DB::table('pesantren')
            ->where('nama', 'like', "%".$keyword."%")
            ->where('provinsiid', '=', $provinsiid)
            ->select('pesantren.id as p_id', 'pesantren.nama', 'province.name', 'img')
            ->join('province', 'pesantren.provinsiid', '=', 'province.id')
            ->leftJoinSub($img, 'img', function($join){
                $join->on('pesantren.id', '=', 'img.pesantrenid');
            })
            ->paginate(9);
        }



        $provinsi = Province::get();

        return view('pesantren', ['pesantren'=>$pesantrenview, 'provinsi'=>$provinsi, 'provinsiid'=>$provinsiid, 'keyword'=>$keyword]);
    }
}
