<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = ['judul', 'ringkasan', 'isi', 'wartawan_id'];

    public function wartawan()
    {
        return $this->belongsTo(Wartawan::class, 'wartawan_id');
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }


    public function category()
{
    return $this->belongsTo(Category::class);
}

}


