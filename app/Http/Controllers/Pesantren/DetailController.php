<?php

namespace App\Http\Controllers\Pesantren;

use App\FotoPesantren;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Potential;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
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

    public function tampilkan($id){
        $pesantren = DB::table('pesantren')
        ->where('pesantren.id', $id)
        ->join('province', 'pesantren.provinsiid', '=', 'province.id')
        ->first();
        $foto = FotoPesantren::where('pesantrenid', $id)->get();
        $potensi = DB::table('potensi_pesantren')
        ->where('potensi_pesantren.pesantrenid', $id)
        ->join('potential', 'potensi_pesantren.potensiid', '=', 'potential.id')
        ->get();
        return view('detail', ['pesantren'=>$pesantren, 'foto'=>$foto, 'potensi'=>$potensi]);
    }
}
