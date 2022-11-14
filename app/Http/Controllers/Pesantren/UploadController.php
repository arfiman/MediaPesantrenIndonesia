<?php

namespace App\Http\Controllers\Pesantren;

use App\FotoPesantren;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesantren;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function tampilkan(){
        return view('upload');
    }

    public function inputPesantren(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'provinsiid' => 'required',
            'notelpon' => 'required',
        ]);

        // FotoPesantren::create([
        //     'title' => $request->title,
        //     'deskripsi' => $request->deskripsi,
        //     'gambar' => $nama_file,
        // ]);

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

        // Pesantren::create([
        //     'pembuatid' => Auth::id(),
        //     'provinsiid' => $request->provinsiid,
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'pemilik' => $request->pemilik,
        //     'tahunberdiri' => $request->tahunberdiri,
        //     'notelpon' => $request->notelpon,
        //     'luas' => $request->luas,
        //     'jumlahsantri' => $request->jumlahsantri,
        //     'jumlahpengajar' => $request->jumlahpengajar,
        // ]);

        foreach ($request->file('images') as $imagefile) {
            $image = new FotoPesantren;
            // Still not working
            $path = $imagefile->store('foto_pesantren');
            $image->img = $path;
            $image->pembuatid = Auth::id();
            $image->pesantrenid = $pesantren->id;
            $image->save();
        }

        return redirect()->back();
    }
}
