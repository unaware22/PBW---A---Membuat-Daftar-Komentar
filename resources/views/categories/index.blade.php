@extends('layouts.app')

@section('content')
<h1>Daftar Kategori</h1>

@foreach ($categories as $category)
    <div style="margin-bottom: 20px;">
        <h3>{{ $category->name }}</h3>
        <ul>
            @foreach ($category->news as $item)
                <li>
                    <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endforeach
@endsection
