<div class="container">
    <nav id="navigation" class="navigation navigation-landscape">
        <div class="nav-header">
            <a class="nav-brand" href="#">
                <img src="/assets/images/logo.png" class="logo" alt="" />
            </a>
            <div class="nav-toggle"></div>
        </div>
        <div class="nav-menus-wrapper">
            <ul class="nav-menu align-to-right">
                <li class="active"><a href="{{ url('/') }}">Beranda</a>

                <li class="">
                    <a href="#">Informasi<span class="submenu-indicator"></span></a>
                    <ul class="nav-dropdown nav-submenu">
                        @foreach (informationLoad() as $item)
                            <li><a href="{{ url('information/' . $item->slug) }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class=""><a href="{{ url('news') }}">Berita</a></li>

                <li>
                    @auth
                        <a href="{{ url('logout') }}">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ url('login') }}">Masuk</a>
                    @endauth
                </li>

            </ul>
        </div>
    </nav>
</div>
