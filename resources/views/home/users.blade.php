@extends('layouts.app')

@section('content')
    <style>
        .all-users {
            margin-top: 20px;
        }

        .user-card img{
            width: 100%;
        }

        .user-login-info {
            background-color: #3A4651;
            text-align: center;
            color: #9CA2A8;
            height: 27px;
        }
    </style>
    <div class="all-users">
        @foreach($users as $user)
            @if (Auth::user()->id != $user->id)
                <div class="user-card col-md-3">
                    <img src="{{asset('img/user')}}/{{ $user->userDetail->avatar }}">
                    <div class="user-login-info">{{ $user->name }}</div>

                    @foreach( $user->send()->where('taker_id', Auth::user()->id)->get() as $req )
                        <button class="btn btn-default btn-block no-border-radius disabled">Отправлено</button>
                    @endforeach

                    @foreach( $user->take()->where('sender_id', Auth::user()->id)->get() as $req )
                        <button class="btn btn-default btn-block no-border-radius">Принять</button>
                    @endforeach

                    {{--@foreach( $friends as $req )
                        <button class="btn btn-default btn-block no-border-radius disabled">В друзьях</button>
                    @endforeach

                    @if( !$send->count() && !$take->count() )
                        <button id="add-user-button" data-id="{{ $user->id }}" class="btn btn-default btn-block no-border-radius">Добавить</button>
                    @endif--}}
                </div>
            @endif
        @endforeach
    </div>
@endsection