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

    public function potentials(){
        return $this->belongsToMany(Potential::class, 'potensi_pesantren', 'pesantrenid', 'potensiid');
    }

    public function foto_pesantren(){
        return $this->hasMany(FotoPesantren::class);
    }
}
