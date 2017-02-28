<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.formstyler.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="wrap">
    <div class="container col-xs-10 col-xs-offset-1" style="background-color: #EFF3F6; box-shadow: black 0px 0px 20px 0px">
        <div class="row">
            <div class="col-md-2">
                <div class="right-column row">
                    @include('home.partials.nav-header')
                </div>
            </div>
            <div class="col-md-10 hidden-xs">
                <div class="row">
                    <nav class="nav-header navbar navbar-static-top">
                        <ul>
                            <li class="dropdown">
                                <a href="#" id="user-info" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="user-login">{{ Auth::user()->name }}</span>
                                    @if (isset(Auth::user()->userDetail->avatar))
                                        <img class="user-avatar img-circle" src="{{asset('img/user')}}/{{ Auth::user()->userDetail->avatar }}">
                                    @else
                                        <img class="user-avatar img-circle" src="{{asset('img/user/no_avatar.png')}}">
                                    @endif
                                </a>

                                <ul class="dropdown-menu user-logout" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="right-column row">
                    @include('home.partials.right-column')
                </div>
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.formstyler.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 5,
                nav: true,
                navText: ["<a class=\"left carousel-control\" href=\"#myCarousel\" data-slide=\"prev\">" +
                            "<span class=\"glyphicon glyphicon-chevron-left\"></span>" +
                        "</a>",
                          "<a class=\"right carousel-control\" href=\"#myCarousel\" data-slide=\"next\">" +
                            "<span class=\"glyphicon glyphicon-chevron-right\"></span>" +
                          "</a>"],
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                smartSpeed: 700,
                responsive:{
                    0:{
                        items:1
                    },
                    768:{
                        items:1
                    },
                    991:{
                        items:3
                    }
                }
            });

            //Меняем лого на голубое
            $('.nav-brand').hover(function () {
                $(this).attr('src', '{{ asset('img/brand-blue.png') }}');
                $(this).css('cursor', 'pointer');
            }, function () {
                $(this).attr('src', '{{ asset('img/brand.png') }}');
            });

            //добавляем в друзья
            $(document).on('click', '#add-user-button', function () {
                var cur_button = $(this);
                var sender_id = {{  Auth::user()->id }};
                var taker_id = $(this).data('id');
                if (cur_button.html() == 'Добавить'){
                    $.ajax({
                        type: "POST",
                        url: "add_to_friends",
                        data: {'sender_id': sender_id, 'taker_id': taker_id},
                        success: function (data) {
                            console.log(data);
                            if (data['success'] == 'ok'){
                                cur_button.html('Отправлено');
                                cur_button.addClass('disabled');
                            }
                        }
                    });
                }
            })
        });
    </script>
</body>
</html>
