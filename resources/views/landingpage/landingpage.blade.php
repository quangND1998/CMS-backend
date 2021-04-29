@extends('client.layout.index')
 {{-- <div class="wrap-header" id="introduction">
    <div class="video">
        <video src="assets/video/header-video.mp4" loop muted autoplay>
        </video>
    </div>

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
</div> --}}


@foreach ($sections as $section)
    @include($section->theme->link_code)
@endforeach





{{--
<div class="slider" id="slider_image_pre">
    <div class="w3-content w3-display-container">
        <button onclick="closeImage_pre()" class="w3-button w3-black w3-display-close">&#10006;</button>

        <img class="mySlides_pre" src="assets/images/vni/3d_content/Premium/1.jpg" style="width:100%">
        <img class="mySlides_pre" src="assets/images/vni/3d_content/Premium/2.jpg" style="width:100%">
        <img class="mySlides_pre" src="assets/images/vni/3d_content/Premium/3.jpg" style="width:100%">
        <img class="mySlides_pre" src="assets/images/vni/3d_content/Premium/4.jpg" style="width:100%">

        <button class="w3-button w3-black w3-display-left" onclick="plusDivs_pre(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs_pre(1)">&#10095;</button>
    </div>

</div>

<div class="slider" id="slider_image_standard">
    <div class="w3-content w3-display-container">
        <button onclick="closeImage_standard()" class="w3-button w3-black w3-display-close">&#10006;</button>

        <img class="mySlides_standard" src="assets/images/vni/3d_content/Standard/1.jpg" style="width:100%">
        <img class="mySlides_standard" src="assets/images/vni/3d_content/Standard/2.jpg" style="width:100%">
        <img class="mySlides_standard" src="assets/images/vni/3d_content/Standard/3.jpg" style="width:100%">
        <img class="mySlides_standard" src="assets/images/vni/3d_content/Standard/4.jpg" style="width:100%">

        <button class="w3-button w3-black w3-display-left" onclick="plusDivs_standard(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs_standard(1)">&#10095;</button>
    </div>

</div>

<div class="slider" id="slider-tour360">
    <div class="w3-display-container content-tour360">
        <button onclick="closeTour360()" class="w3-button w3-black w3-display-close">&#10006;</button>

        <iframe width="100%" height="100%" id="slidetour360" class="slidestour360" id="frame_detail" scrolling="no"
            src="">
        </iframe>
    </div>

</div> --}}



</body>
</html>

