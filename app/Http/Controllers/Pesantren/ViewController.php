<?php

namespace App\Http\Controllers\Pesantren;

use App\FotoPesantren;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesantren;
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

    public function tampilkan() {
        $pesantren = DB::table('pesantren')
        ->get();

        $pesantrenview = DB::table('pesantren')
        ->select('pesantren.id as p_id', 'pesantren.nama', 'province.name')
        ->join('province', 'pesantren.provinsiid', '=', 'province.id')
        ->get();

        $img = [];
        foreach ($pesantren as $p) {
            $strtemp = DB::table('foto_pesantren')->where("pesantrenid", '=', $p->id)->first()->img;
            array_push($img, $strtemp);
        }
        return view('pesantren', ['pesantren'=>$pesantrenview, 'img'=>$img]);
    }

    public function pencarian(Request $request){
        $keyword = $request->keyword;
        $hasil = Pesantren::where('nama', 'like', "%".$keyword."%");
        foreach ($hasil as $p) {
            $p['img'] = FotoPesantren::where("pesantrenid", '=', $p->id)->first()->img;
        }
        return view('pesantren', ['pesantren'=>$hasil]);
    }
}
