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

class EditController extends Controller
{
    public function tampilkan($id){
        $pesantren = DB::table('pesantren')->where('pesantren.id', $id)->first();
        $foto = FotoPesantren::where('pesantrenid', $id)->get();
        $potensi_pesantren = DB::table('potensi_pesantren')
        ->select('potential.name')
        ->where('potensi_pesantren.pesantrenid', $id)
        ->join('potential', 'potensi_pesantren.potensiid', '=', 'potential.id')
        ->get()['name'];

        $provinsi = Province::get();
        $potensi = Potential::get();

        foreach ($potensi as $pot) {
            if(in_array($pot->name, $potensi_pesantren)){
                $pot['checked'] = true;
            }
        }

        return view('edit', ['provinsi'=>$provinsi, 'potensi'=>$potensi, 'pesantren'=>$pesantren, 'foto'=>$foto]);
    }

    public function update(Request $request){

        $pesantren = Pesantren::where('id', $request->id)->first();
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

        Potential::get()->potensi_pesantren()->detach($request->id);

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
