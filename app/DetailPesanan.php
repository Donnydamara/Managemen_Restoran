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

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
// by syifa
