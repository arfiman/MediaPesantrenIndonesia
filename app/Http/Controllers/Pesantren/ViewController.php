<?php

namespace App\Http\Controllers\Pesantren;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesantren;

class ViewController extends Controller
{
    public function tampilkan() {
        $pesantren = Pesantren::all();

        return view('pesantren', ['pesantren'=>$pesantren]);
    }

    public function pencarian(Request $request){
        $keyword = $request->keyword;
        $hasil = Pesantren::where('nama', 'like', "%".$keyword."%");

        return view('pesantren', ['pesantren'=>$hasil]);
    }
}
