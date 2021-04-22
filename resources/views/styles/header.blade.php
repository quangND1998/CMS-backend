<div class="wrap-header" id="introduction">
    <div class="video">
        <video src="assets/video/header-video.mp4" loop muted autoplay>
        </video>
    </div>
    {{-- <div class="overlay-hd">
        </div> --}}
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-sticky">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid"
                        src="assets/images/vni/logo_vni.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto mr-auto">
                        <li class="nav-item"><a class="nav-link active"
                                href="{{ url('#introduction') }}">{{ trans('home.header.introduction') }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('#vr-showroom') }}">{{ trans('home.header.product') }}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('#solution') }}">{{ trans('home.header.solution') }}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('#3D-content') }}">{{ trans('home.header.3D-contents') }}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('#contact') }}">{{ trans('home.contact') }}</a></li>
                    </ul>
                    {{-- <a href="{{ url('#contact') }}"
                            class="btn btn-light btn-rounded d-none d-lg-block">{{ trans('home.contact') }}</a> --}}
                    <a href="{{ url('admin/login') }}" target="_blank"
                        class="btn btn-light btn-rounded d-none d-lg-block btn-login">{{ trans('home.login') }}</a>
                    <li class=" navbar-nav nav-item-left flat">
                        <a class="flat_icon" href="{{ url(Request::getPathInfo() . '?lang=en') }}"><img
                                src="assets/images/flat/en.png"></a>
                        <a class="flat_icon" href="{{ url(Request::getPathInfo() . '?lang=vn') }}"><img
                                src="assets/images/flat/vn.png"></a>
                    </li>
                </div>
            </div>
        </nav>
        <section id="home" class="parallax-fixed main-banner bg-videos video-placeholder">
            <div class="container">
                <div class="">
                    <div class="wow zoomIn bottom-center" style="width: fit-content">
                        <h1 class="text-white strong text-uppercase text-center" data-wow-duration=".2s"
                            data-wow-delay=".1s">{{ trans('home.caption') }}</h1>

                    </div>

                </div>
            </div>
        </section>

    </header>
</div>