<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_Pesanan extends Model
{
    
    protected $table = 'tbl_pesanan';

    protected $fillable = [
        'id_user',
        'no_pesanan',
        'no_hp',
        'jenis_pembayaran',
        'jenis_pesanan',
        'status',
    ];

    
}
// by syifa