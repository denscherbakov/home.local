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
                    
                    @foreach( $user->take()->whereSend()->accepted()->get() as $req )
                        <div class="btn btn-default btn-block no-border-radius">В друзьях</div>
                    @endforeach

                    @foreach( $user->take()->whereSend()->noAccepted()->get() as $req )
                        <div class="btn btn-default btn-block no-border-radius disabled">Отправлено</div>
                    @endforeach

                    @foreach( $user->send()->whereTake()->accepted()->get() as $req )
                        <div class="btn btn-default btn-block no-border-radius">В друзьях</div>
                    @endforeach

                    @foreach( $user->send()->whereTake()->noAccepted()->get() as $req )
                        <div onclick="location.href = '{{ URL('/') }}'"  class="btn btn-default btn-block no-border-radius">Принять</div>
                    @endforeach

                    @if( !$user->take()->whereSend()->count() &&  !$user->send()->whereTake()->count())
                        <div id="add-user-button" data-id="{{ $user->id }}" class="btn btn-default btn-block no-border-radius">Добавить</div>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
@endsection