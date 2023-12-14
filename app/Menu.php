<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'tbl_menu';

    protected $fillable = [
        'id_kategori',
        'nama_menu',
        'deskripsi',
        'harga',
        'image',
    ];

    // Model Menu
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
