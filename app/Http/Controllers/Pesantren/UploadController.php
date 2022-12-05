<?php

namespace App\Http\Controllers\Pesantren;

use App\FotoPesantren;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesantren;
use App\Potential;
use App\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
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

    public function tampilkan(){
        $provinsi = Province::get();
        $potensi = Potential::get();
        $pesantren = DB::table('pesantren')
        ->where('pesantren.id', Auth::id())
        ->join('province', 'pesantren.provinsiid', '=', 'province.id')
        ->select('pesantren.id', 'pesantren.nama', 'province.name')
        ->get();
        return view('upload', ['provinsi'=>$provinsi, 'potensi'=>$potensi, 'pesantren'=>$pesantren]);
    }

    public function inputPesantren(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'provinsiid' => 'required',
            'notelpon' => 'required',
        ]);

        $pesantren = new Pesantren;
        $pesantren->pembuatid = Auth::id();
        $pesantren->provinsiid = $request->provinsiid;
        $pesantren->nama = $request->nama;
        $pesantren->alamat = $request->alamat;
        $pesantren->pemilik = $request->pemilik;
        $pesantren->tahunberdiri = $request->tahunberdiri;
        $pesantren->notelpon = $request->notelpon;
        $pesantren->luas = $request->luas;
        $pesantren->jumlahsantri = $request->jumlahsantri;
        $pesantren->jumlahpengajar = $request->jumlahpengajar;
        $pesantren->save();


        $potentials = Potential::get();
        foreach ($potentials as $potential){
            if($request->has($potential->name)){
                $potential->potensi_pesantren()->attach($pesantren->id);
            }
        }

        if($request->hasFile('images')){
            $imagefiles = $request->file('images');
            foreach ($imagefiles as $imagefile) {
                $image = new FotoPesantren;
                $path = $imagefile->store('foto_pesantren');
                $image->img = $path;
                $image->pembuatid = Auth::id();
                $image->pesantrenid = $pesantren->id;
                $image->save();
            }
        }

        return redirect()->back();
    }

}
