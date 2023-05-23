<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class t211_detailrincian extends Model
{
    protected $table = 't211_detailrincian';
    protected $primaryKey = 'id';
    protected $casts = ['id' => 'string' ];

    public function spk()
    {
        return $this->belongsTo(t209_suratperintahkerja::class, 'id_spk');
    }   



   
}

 