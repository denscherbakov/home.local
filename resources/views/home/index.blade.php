@extends('layouts.app')

@section('content')
    <style>
        .owl-carousel {
            box-shadow: #7FC6DA 0px 0px 37px -8px;
        }
        .item:hover {
            opacity: 0.8;
        }
    </style>
<div class="owl-carousel owl-theme" style="margin-top: 20px">
    <div class="item">
        <img src="{{ asset('img/owl/1.jpg') }}">
    </div>
    <div class="item">
        <img src="{{ asset('img/owl/2.jpg') }}">
    </div>
    <div class="item">
        <img src="{{ asset('img/owl/3.jpg') }}">
    </div>
    <div class="item">
        <img src="{{ asset('img/owl/4.jpg') }}">
    </div>
    <div class="item">
        <img src="{{ asset('img/owl/5.jpg') }}">
    </div>
    <div class="item">
        <img src="{{ asset('img/owl/6.jpg') }}">
    </div>
</div>

    @foreach($articles as $article)
        <hr>
        <article>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><a href="/article/{{ $article->id }}">{{ $article->title }}</a></h3>
                </div>

                <div class="panel-body" style="background-color: white">
                    {{ $article->content }}
                </div>

                <div class="panel-footer">
                    @if (Auth::check())
                        <like
                              :article={{ $article->id }}
                              :liked={{ $article->liked() ? 'true' : 'false' }}
                        ></like>
                    @endif
                    <small>
                        {{ $article->published_at }} / <a href="/article/user/{{ $article->author->id }}">{{ $article->author->name }}</a>
                    </small>
                </div>
            </div>
        </article>
    @endforeach
    {{ $articles->links() }}
@endsection