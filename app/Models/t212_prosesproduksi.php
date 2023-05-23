<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class t212_prosesproduksi extends Model
{
    protected $table = 't212_prosesproduksi';
    protected $primaryKey = 'id';
    protected $casts = ['id' => 'string' ];

    public function employee()
    {
        return $this->belongsTo(hrde200_employee::class, 'nama_operator');
    }   



   
}

 