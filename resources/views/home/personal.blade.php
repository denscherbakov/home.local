@extends('layouts.app')

@section('content')
    <style>
        .user-image, .user-info-table {
            background-color: white;
            margin-top: 20px;
            text-align: center;
        }
        .user-image {
            margin-top: 40px;
        }
        .user-image img {
            margin-top: -20px;
            width: 100%;
            max-width: 215px;
            box-shadow: 0px 0px 10px 0px;
        }
        .personal-button {
            min-height: 50px;
            background-color: #5AC2E7;
            border-radius: 0px;
            border: none;
        }
        .personal-button:hover {
            background-color: #5AC2C4;
        }
    </style>
    <div class="col-md-4">
        <div class="user-image col-md-12">
            @if (isset($user->userDetail->avatar))
                <img src="{{asset('img/user')}}/{{ $user->userDetail->avatar }}">
            @else
                <img src="{{asset('img/user/no_avatar.png')}}">
            @endif
            <h3 style="text-transform: uppercase; text-align: center">{{ $user->name }}</h3>
        </div>
        <button href="#modal-user-edit" class="personal-button btn btn-primary btn-block" data-toggle="modal">Редактировать</button>
    </div>
    <div class="col-md-8">
        <div class="user-info-table col-md-12">
            @if(isset($user->userDetail->id))
                <table class="table">
                    <tr>
                        <td>Имя</td><td>{{ $user->userDetail->first_name }}</td>
                    </tr>
                    <tr>
                        <td>Фамилия</td><td>{{ $user->userDetail->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Дата рождения</td><td>{{ $user->userDetail->birthday }}</td>
                    </tr>
                    <tr>
                        <td>Email</td><td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Группа</td><td>{{ $user->userDetail->group->name }}</td>
                    </tr>
                    <tr>
                        <td>Обо мне</td><td>{{ $user->userDetail->about }}</td>
                    </tr>
                    <tr>
                        <td>Подпись</td><td>{{ $user->userDetail->label }}</td>
                    </tr>
                </table>
            @else
                <table class="table">
                    <tr>
                        <td>Имя</td><td>Пусто</td>
                    </tr>
                    <tr>
                        <td>Фамилия</td><td>Пусто</td>
                    </tr>
                    <tr>
                        <td>Дата рождения</td><td>Пусто</td>
                    </tr>
                    <tr>
                        <td>Email</td><td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Группа</td><td>Пусто</td>
                    </tr>
                    <tr>
                        <td>Обо мне</td><td>Пусто</td>
                    </tr>
                    <tr>
                        <td>Подпись</td><td>Пусто</td>
                    </tr>
                </table>
            @endif

        </div>
    </div>

    <!-- MODAL WINDOW -->
    <div id="modal-user-edit" class="modal fade col-md-8 col-md-offset-2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Редактирование данных</h4>
                </div>
                <form action="/users/edit/{{ $user->id }}" method="post" class="form-group" id="form-user-edit">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="first_name" class="form-control" value="{{ $user->userDetail->first_name }}">
                        <input type="text" name="last_name" class="form-control" value="{{ $user->userDetail->last_name }}">
                        <input type="date" name="birthday" class="form-control" value="{{ $user->userDetail->birthday }}">
                        <input type="text" name="about" class="form-control" value="{{ $user->userDetail->about }}">
                        <input type="text" name="label" class="form-control" value="{{ $user->userDetail->label }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="personal-button btn btn-danger" style="background-color: #d9534f" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="personal-button btn btn-primary">Сохранить изменения</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODAL WINDOW -->
@endsection