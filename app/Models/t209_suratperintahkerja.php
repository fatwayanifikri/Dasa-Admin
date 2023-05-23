<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class t209_suratperintahkerja extends Model
{
    protected $table = 't209_suratperintahkerja';
    protected $primaryKey = 'id';
    protected $casts = ['id' => 'string' ];

    public function qty()
    {
        return $this->belongsTo(t210_rincianproduk::class, 'id');
    }   



   
}

 