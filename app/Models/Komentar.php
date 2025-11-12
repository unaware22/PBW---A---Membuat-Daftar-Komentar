<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    // ⚠️ Tambahkan baris ini agar pakai tabel "komentar", bukan "komentars"
    protected $table = 'komentar';

    protected $fillable = ['nama', 'isi', 'news_id'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

}
