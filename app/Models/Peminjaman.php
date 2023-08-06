<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['siswa', 'buku'];
    protected $casts = ['tglKembali' => 'date:Y-m-d'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
