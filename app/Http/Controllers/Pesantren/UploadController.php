<?php

namespace App\Http\Controllers\Pesantren;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //

    public function inputPesantren(Request $request)
    {
        $this->validate($request, [
            // 'gambar' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            // 'deskripsi' => 'required',
            // 'title' => 'required'
            'nama' => 'required',
            'alamat' => 'required',
            'provinsiid' => 'required',
            'notelp' => 'required',
            'img' => 'required|file|max:2048'
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $img = $request->file('img');

        $filename = $request->nama . "." . $img->getClientOriginalName();
        $filename = str_replace(" ", "", $filename);

        // isi dengan nama folder tempat kemana file diupload
        $file_dest = 'gambarpesantren';
        $img->move($file_dest, $filename);

        // Modul::create([
        //     'title' => $request->title,
        //     'deskripsi' => $request->deskripsi,
        //     'gambar' => $nama_file,
        // ]);

        return redirect()->back();
    }
}
