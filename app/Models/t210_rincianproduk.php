<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class t210_rincianproduk extends Model
{
    protected $table = 't210_rincianproduk';
    protected $primaryKey = 'id';
    protected $casts = ['id' => 'string' ];

    public function spk()
    {
        return $this->belongsTo(t209_suratperintahkerja::class, 'id_spk');
    }   

    public function detail()
    {
        return $this->belongsTo(t211_detailrincian::class, 'id_detail_rincian');
    }



   
}

 