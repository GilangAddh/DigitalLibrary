<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MKategori extends Model
{
    use HasFactory;
    protected $table = 'tbl_kategori';
    protected $primaryKey = 'id_kategori';
}
