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
        ->join('province', 'pesantren.provinsiid', '=', 'province.id')
        ->get();

        foreach ($pesantren as $p) {
            $p['img'] = DB::table('foto_pesantren')->where("pesantrenid", '=', $p->id)->first()->img;
        }
        return view('home', ['pesantren'=>$pesantren]);
    }
}
