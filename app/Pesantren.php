<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesantren extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pesantren';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pembuatid',
        'provinsiid',
        'nama',
        'alamat',
        'pemilik',
        'tahunberdiri',
        'notelpon',
        'luas',
        'jumlahsantri',
        'jumlahpengajar'
    ];

    public function potensi_pesantren(){
        return $this->belongsToMany(Potential::class, 'potensi_pesantren', 'pesantrenid', 'potensiid');
    }

    public function foto_pesantren(){
        return $this->hasMany(FotoPesantren::class);
    }
}
