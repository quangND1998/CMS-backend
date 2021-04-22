@extends('client.layout.index')
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


@foreach ($sections as $section)
    @include($section->theme->link_code)
@endforeach




<section id="blogs news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ml-auto mr-auto text-center">
                <h2 class="heading">{{ trans('home.news') }}</h2>
                <p>{{ trans('home.des_news') }}</p>
            </div>
        </div>
        <div class="blog-slider center-align owl-carousel owl-theme">
            @foreach ($blog['theloai'] as $theloai)
                    @if (count($theloai->LoaiTin) > 0)
                        <?php $data = $theloai->TinTuc
                            ->where('NoiBat', 1)
                            ->sortByDesc('created_at')
                            ->take(10); ?>
                        @foreach ($data as $remaining_article)
                            <div class="icon-block text-center item wow fadeIn" data-wow-duration=".2s"
                                data-wow-delay=".1s">
                                <div class="post-block">
                                    <a href="tin-tuc/{{ $remaining_article['TieuDeKhongDau'] }}.html">
                                        <img class="img-fluid image_new w-100"
                                            src="{{ $remaining_article['Hinh'] }}" alt="" />
                                    </a>
                                    @if (Config::get('app.locale') == 'vn')
                                        <h5 class=" text-center mb-3 mt-3">{{ $remaining_article['TieuDe'] }}</h5>
                                    @endif
                                    @if (Config::get('app.locale') == 'en')
                                        <h5 class=" text-center mb-3 mt-3">{{ $remaining_article['TieuDe_en'] }}</h5>
                                    @endif
                                    <h6 class=" mb-3 mt-3">Time: {{ $remaining_article['created_at'] }}</h6>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
        </div>
    </div>
</section>
<section class="bg-light">
    <div class="container">
        {{-- <div class="row">
            </div> --}}
        <div class="row align-items-center">
            <div class="col-lg-6 mr-auto text-left btn-our-mission  order-md-1 wow zoomIn" data-wow-duration=".5s"
                data-wow-delay=".2s">
                <div class="col-lg-12 ">
                    <h2 class="heading">{{ trans('home.our-mission.title') }}</h2>
                    <p>{{ trans('home.our-mission.des') }}
                    </p>
                    <p><a href="#contact" class="btn btn-cta btn-lg btn-rounded">JOIN US</a></p>
                </div>

            </div>
            <div class="col-lg-6  order-md-2 wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">
                <img class="img-row" src="assets/images/action/tamnhin.png" alt="" />

            </div>

        </div>
    </div>
</section>

<div class="slider" id="slider-image">
    <div class="w3-content w3-display-container">
        <button onclick="closeImage()" class="w3-button w3-black w3-display-close">&#10006;</button>

        <img class="mySlides" src="assets/images/vni/congtrinh/1.jpg" style="width:100%">
        <img class="mySlides" src="assets/images/vni/congtrinh/2.jpg" style="width:100%">
        <img class="mySlides" src="assets/images/vni/congtrinh/3.jpg" style="width:100%">
        <img class="mySlides" src="assets/images/vni/congtrinh/4.jpg" style="width:100%">

        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>

</div>
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

@endsection
