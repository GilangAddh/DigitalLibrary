<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBuku extends Model
{
    use HasFactory;
    protected $table = 'tbl_buku';
    protected $primaryKey = 'id_post';

    public function kategori()
    {
        return $this->belongsTo(MKategori::class, 'id_kategori');
    }
}
