<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\News;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'isi' => 'required|string|max:1000',
        ]);

        $news->komentars()->create([
            'nama' => $request->nama,
            'isi' => $request->isi,
        ]);

        return redirect()->back();
    }
}
