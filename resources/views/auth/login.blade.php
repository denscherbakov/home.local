@extends('auth.layouts.app')

@section('content')
<div class="container" style="margin-top: 200px">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
            <div class="login-panel panel panel-default no-border-radius">
                <div class="panel-heading">Login</div>
                    <form style="margin-top: 20px" class="form-horizontal no-border-radius" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                                <input id="name" type="text" class="form-control no-border-radius" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                                <input id="password" type="password" class="form-control no-border-radius" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1" style="padding-right: 0">
                                <div class="col-md-6 hidden-xs">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <button style="float: right" type="submit" class="btn btn-primary no-border-radius">
                                        Login <i class="glyphicon glyphicon-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
