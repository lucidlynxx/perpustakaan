<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Rak extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namaRak'
            ]
        ];
    }
}
