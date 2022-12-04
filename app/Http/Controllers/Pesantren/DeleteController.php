<?php

namespace App\Http\Controllers\Pesantren;

use App\FotoPesantren;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pesantren;
use App\Potential;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
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

    public function hapusPesantren($id){
        $pesantren = Pesantren::where('id', $id);
        if (Auth::id() != $pesantren->first()->pembuatid) {
            return redirect()->back();
        }

        $fotopesantren = FotoPesantren::where('pesantrenid', $id);
        foreach ($fotopesantren->get() as $foto) {
            Storage::delete($foto->img);
        }

        DB::table('potensi_pesantren')->where('pesantrenid', $id)->delete();
        $fotopesantren->delete();
        $pesantren->delete();

        return redirect()->back();
    }

    public function hapusFoto($id){
        $foto = FotoPesantren::where('id', $id);
        if (Auth::id() != $foto->first()->pembuatid) {
            return redirect()->back();
        }

        Storage::delete($foto->first()->img);
        $foto->delete();

        return redirect()->back();
    }
}
