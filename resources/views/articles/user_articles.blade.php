@extends('layouts.app')

@section('content')
    @foreach($articles as $article)
        <h4><a href="/article/{{ $article->id }}">{{ $article->title }}</a></h4>
    @endforeach
@endsection