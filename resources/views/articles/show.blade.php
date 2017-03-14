@extends('layouts.app')

@section('content')
    <article>
        <h3>{{ $article->title }}</h3>
        <div class="body">{{ $article->content }}</div>
        <div class="footer">
            <small>
                {{ $article->published_at }} /
                <a href="/article/user/{{ $article->author->id }}">{{ $article->author->name }}</a>
            </small>
        </div>
    </article>
@endsection