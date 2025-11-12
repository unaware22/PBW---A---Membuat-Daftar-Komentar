<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->input('q');

    $query = News::with('wartawan');

    if ($keyword) {
        $query->where('judul', 'like', "%{$keyword}%")
              ->orWhere('ringkasan', 'like', "%{$keyword}%")
              ->orWhere('isi', 'like', "%{$keyword}%");
    }

    $news_list = $query->orderBy('id', 'desc')->paginate(6);

    return view('news.index', [
        'news_list' => $news_list
    ]);
}


    public function show(News $news)
    {
        $news->load('wartawan', 'komentars');

        return view('news.show', [
            'news' => $news
        ]);
    }
}
