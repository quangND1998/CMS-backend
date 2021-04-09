</header>
<nav class="navbar navbar-expand-lg navbar-sticky">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid" src="assets/images/vni/logo_vni.png"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto mr-auto">
                <li class="nav-item"><a class="nav-link" data-scroll
                        href="{{ url('/') }}">{{ trans('home.header.introduction') }}</a></li>
                <li class="nav-item"><a class="nav-link" data-scroll
                        href="{{ url('#sanpham') }}">{{ trans('home.header.product') }}</a></li>
                <li class="nav-item"><a class="nav-link" data-scroll
                        href="{{ url('#why') }}">{{ trans('home.header.solution') }}</a></li>
                <li class="nav-item"><a class="nav-link" data-scroll
                        href="{{ url('#3D-content') }}">{{ trans('home.header.sample') }}</a></li>

            </ul>

            <a href="#contact" class="btn btn-light btn-rounded d-none d-lg-block">{{ trans('home.contact') }}</a>
            <li class=" navbar-nav nav-item flat">
                <a href="{{ url(Request::getPathInfo() . '?lang=en') }}"><img src="assets/images/flat/en.png"></a>
                <a href="{{ url(Request::getPathInfo() . '?lang=vn') }}"><img src="assets/images/flat/vn.png"></a>
            </li>
        </div>
    </div>
</nav>
</header>
