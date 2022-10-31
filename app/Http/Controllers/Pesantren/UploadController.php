<?php

namespace App\Http\Controllers\Pesantren;

use App\FotoPesantren;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesantren;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    //

    public function inputPesantren(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'provinsiid' => 'required',
            'notelp' => 'required',
        ]);

        // FotoPesantren::create([
        //     'title' => $request->title,
        //     'deskripsi' => $request->deskripsi,
        //     'gambar' => $nama_file,
        // ]);

        Pesantren::create([
            'pembuatid' => Auth::id(),
            'provinsiid' => $request->provinsiid,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'pemilik' => $request->pemilik,
            'tahunberdiri' => $request->tahunberdiri,
            'notelpon' => $request->notelpon,
            'luas' => $request->luas,
            'jumlahsantri' => $request->jumlahsantri,
            'jumlahpengajar' => $request->jumlahpengajar,
        ]);

        return redirect()->back();
    }

    public function uploadFoto($request){

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'provinsiid' => 'required',
            'notelp' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $img = $request->file('img');

        $filename = $request->nama . "." . $img->getClientOriginalName();
        $filename = str_replace(" ", "", $filename);

        // isi dengan nama folder tempat kemana file diupload
        $file_dest = 'gambarpesantren';
        $img->move($file_dest, $filename);

        FotoPesantren::create([
            'pembuatid' => Auth::id(),
            'pesantrenid' => $request->pesantrenid,
            'img' => $filename
        ]);

        return redirect()->back();
    }
}
