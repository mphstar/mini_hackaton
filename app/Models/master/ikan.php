<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ikan extends Model
{
    use HasFactory;
    protected $table = 'master_data_ikan';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'nama_ikan', 'stok', 'deskripsi', 'gambar'
    ];
}
