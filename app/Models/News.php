<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $dates = [
        'tanggal',
    ];
    protected $fillable = [
        'kategori_id', // Tambahkan 'kategori_id' ke dalam $fillable
        'user_id',
        'title',
        'deskripsi',
        'tanggal',
        // kolom-kolom lain yang ingin diizinkan untuk mass assignment
    ];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
