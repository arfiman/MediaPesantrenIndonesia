<?php

namespace App\Http\Controllers\Pesantren;

use App\FotoPesantren;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesantren;
use App\Potential;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function hapusPesantren($id){
        $fotopesantren = FotoPesantren::where('pesantrenid', $id)->get();
        foreach ($fotopesantren as $foto) {
            Storage::delete($foto->img);
        }

        DB::table('potensi_pesantren')->where('pesantrenid', $id)->delete();
        FotoPesantren::where('pesantrenid', $id)->delete();
        Pesantren::where('id', $id)->delete();

        return redirect()->back();
    }

    public function hapusFoto($id){
        $foto = FotoPesantren::where('id', $id)->first();
        Storage::delete($foto->img);
        FotoPesantren::where('id', $id)->delete();

        return redirect()->back();
    }
}
