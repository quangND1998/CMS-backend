<div class="wrap-header" id="{{ Str::of($section->text)->slug('-') }}">
    @foreach ($section->section_category as $categorys)

        @if ($categorys->type == 4)
            <div class="video">
                @foreach ($categorys->contents as $content)
                    <video src="{{ $content->video_upload }}" loop muted autoplay>
                    </video>
                @endforeach
            </div>


        @elseif ($categorys->type == 5)
            <header class="header">
                <nav class="navbar navbar-expand-lg navbar-sticky">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid"
                                src="assets/images/vni/logo_vni.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">

                            <ul class="navbar-nav ml-auto mr-auto">


                                @foreach ($categorys->contents as $content)

                                    @if ($loop->first)

                                        @if (Config::get('app.locale') == 'en')
                                            <li class="nav-item"><a class="nav-link active"
                                                    href="{{ url('#' . Str::of($content->title)->slug('-')) }}">{{ $content->detail }}</a>
                                            </li>
                                        @endif
                                        @if (Config::get('app.locale') == 'vn')
                                            <li class="nav-item"><a class="nav-link active"
                                                    href="{{ url('#' . Str::of($content->title)->slug('-')) }}">{{ $content->detail_vn }}</a>
                                            </li>
                                        @endif
                                    @else
                                        @if (Config::get('app.locale') == 'en')
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ url('#' . Str::of($content->title)->slug('-')) }}">{{ $content->detail }}</a>
                                            </li>
                                        @endif
                                        @if (Config::get('app.locale') == 'vn')
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ url('#' . Str::of($content->title)->slug('-')) }}">{{ $content->detail_vn }}</a>
                                            </li>
                                        @endif



                                    @endif


                                @endforeach


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
            @elseif ($categorys->type ==6)
                <section id="home" class="parallax-fixed main-banner bg-videos video-placeholder">
                    <div class="container">
                        <div class="">
                            <div class="wow zoomIn bottom-center" style="width: fit-content">


                                @foreach ($categorys->contents as $content)
                                    @if (Config::get('app.locale') == 'vn')
                                        <h1 class="text-white strong text-uppercase text-center" data-wow-duration=".2s"
                                            data-wow-delay=".1s">{{ trans('home.caption') }}</h1>
                                    @endif
                                    @if (Config::get('app.locale') == 'en')
                                        <h1 class="text-white strong text-uppercase text-center" data-wow-duration=".2s"
                                            data-wow-delay=".1s">{{ trans('home.caption') }}</h1>
                                    @endif
                                @endforeach




                            </div>

                        </div>
                    </div>
                </section>
        @endif

        </header>
</div>
@endforeach
