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