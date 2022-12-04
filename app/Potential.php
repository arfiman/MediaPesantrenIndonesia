<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potential extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'potential';

    public function potensi_pesantren(){
        return $this->belongsToMany(Potential::class, 'potensi_pesantren', 'potensiid', 'pesantrenid');
    }
}
