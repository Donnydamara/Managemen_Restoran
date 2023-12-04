<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'tbl_detail_pesanan';

    protected $fillable = [
        'id_pesanan',
        'id_menu',
        'nama_menu',
        'jumlah',
        'harga',
        'subtotal',
    ];
}
// by syifa