<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tbl_kategori';

    protected $fillable = [
        'kategori',
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'id_kategori', 'id');
    }
}
