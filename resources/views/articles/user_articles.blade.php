@extends('layouts.app')

@section('content')
        <ul>
            @foreach($articles as $article)
                <li><a href="/article/{{ $article->id }}">{{ $article->title }}</a></li>
            @endforeach
        </ul>
@endsection