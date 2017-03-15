@section('right-column')
    <style>
        .panel {
            background-color: #3A4651;
            margin-bottom: 0;
            border-radius: 0;
            border: none;
        }
        .right-column a {
            text-decoration: none;
        }
    </style>
    <div class="right-column-items" id="accordion">
        @foreach(\App\Menu::all()->sortBy('sort') as $menu)
            @if (count($menu->parent) == 0 && count($menu->child) == 0)
                <a class="@if ($menu->link == '/') home-item @endif" href="{{$menu->link}}">
                    <i class="glyphicon glyphicon-{{$menu->glyph}}"></i> {{$menu->name}}
                </a>
            @elseif(count($menu->parent) == 0 && count($menu->child) > 0)
                <div class="panel">
                    <a data-toggle="collapse" data-parent="#accordion"  href="/#collapse{{$menu->id}}">
                        <i class="glyphicon glyphicon-{{$menu->glyph}}"></i> {{$menu->name}}
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="collapse{{$menu->id}}">
                        @foreach($menu->child as $childMenu)
                            <a href="{{$childMenu->link}}" style="padding-left: 30px" data-toggle="collapse">
                                <i class="glyphicon glyphicon-{{$childMenu->glyph}}"></i> {{$childMenu->name}}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
            <li class="visible-xs" style="background-color: #3A464A">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="glyphicon glyphicon-log-out"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
    </div>
    <script>
        $(".submenu").click(function(){
            $(".collapse").collapse('hide');
        });
    </script>
@show