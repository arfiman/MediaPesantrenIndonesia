<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoPesantren extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'foto_pesantren';

    public function pesantrens(){
        return $this->belongsTo(Pesantren::class);
    }
}
