<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuPerkategori extends Model
{
    protected $table = 'tbl_menu';
    protected $fillable = ['id_kategori', 'nama_menu'];
}
