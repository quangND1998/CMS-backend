<section id="blogs news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ml-auto mr-auto text-center">
                <h2 class="heading">{{ trans('home.news') }}</h2>
                <p>{{ trans('home.des_news') }}</p>
            </div>
        </div>
        <div class="blog-slider center-align owl-carousel owl-theme">
            {{-- @foreach ($data['theloai'] as $theloai)
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
                                            src="upload/tintuc/{{ $remaining_article['Hinh'] }}" alt="" />
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
                @endforeach --}}
        </div>
    </div>
</section>
