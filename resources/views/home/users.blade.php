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
                    @if( Auth::user()->id == $req->sender_id && $user->id == $req->taker_id )
                        <button class="btn btn-default btn-block no-border-radius disabled">Отправлено</button>
                        @break
                    @elseif( Auth::user()->id == $req->taker_id && $user->id == $req->sender_id )
                        <button class="btn btn-default btn-block no-border-radius">Принять</button>
                        @break
                    @elseif( )
                        <button id="add-user-button" data-id="{{ $user->id }}" class="btn btn-default btn-block no-border-radius">Добавить</button>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
@endsection