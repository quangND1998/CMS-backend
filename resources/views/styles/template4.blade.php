<section id="3D-content">
    <div class="container">
        <div class="row">
            <div class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp" data-wow-duration=".2s"
                data-wow-delay=".1s">
                @if (Config::get('app.locale') == 'vn')
                    <h2 class="heading">{{ $section->title_vn }}</h2>
                @endif
                @if (Config::get('app.locale') == 'en')
                    <h2 class="heading">{{ $section->title }}</h2>
                @endif



                <div class="tab">


                    @foreach ($section->section_category as $categorys)
                        @if ($loop->first)

                            @if (Config::get('app.locale') == 'vn')
                                <button class="tablinks tablinks2 active" id="defaultOpen1"
                                    onclick="showContentTab(event, '{{ Str::of($categorys->title)->slug('-') }}')">{{ $categorys->title_vn }}</button>
                            @endif
                            @if (Config::get('app.locale') == 'en')
                                <button class="tablinks tablinks2 active" id="defaultOpen1"
                                    onclick="showContentTab(event, '{{ Str::of($categorys->title)->slug('-') }}')">{{ $categorys->title }}</button>
                            @endif

                        @else
                            @if (Config::get('app.locale') == 'vn')
                                <button class="tablinks tablinks2"
                                    onclick="showContentTab(event, '{{ Str::of($categorys->title)->slug('-') }}')">{{ $categorys->title_vn }}</button>
                            @endif
                            @if (Config::get('app.locale') == 'en')
                                <button class="tablinks tablinks2"
                                    onclick="showContentTab(event, '{{ Str::of($categorys->title)->slug('-') }}')">{{ $categorys->title }}</button>
                            @endif


                        @endif
                    @endforeach
                </div>



                {{-- @endforeach --}}
                <p class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp">
                    @if (Config::get('app.locale') == 'vn')
                        {{ $section->sub_title_vn }}
                    @endif
                    @if (Config::get('app.locale') == 'en')
                        {{ $section->sub_title }}
                    @endif

                </p>
            </div>
        </div>
        @foreach ($section->section_category as $categorys)


            @if ($categorys->type == 0)




                <div id="{{ Str::of($categorys->title)->slug('-') }}" class="tabcontent tabcontent2">
                    <section class="customer">
                        <div class="container ">
                            <div class="app-screenshots center-align owl-carousel owl-theme row">

                                @foreach ($categorys->contents as $content)
                                    <div class="item ml-auto mr-auto wow fadeIn" data-wow-duration=".2s"
                                        data-wow-delay=".1s">
                                        <iframe class="fame_mobile" width="100%" height="300" allowfullscreen
                                            src={{ $content->video }}></iframe>
                                        <h6 class="text-center mb-3 mt-3">{{ $content->title }}</h6>
                                    </div>


                                @endforeach




                            </div>
                        </div>
                    </section>
                </div>
            @elseif ($categorys->type ==1)
                <div id="{{ Str::of($categorys->title)->slug('-') }}" class="tabcontent tabcontent2">
                    <section class="customer">
                        <div class="container ">
                            <div class="app-screenshots center-align owl-carousel owl-theme row">
                                @foreach ($categorys->contents as $content)

                                    <div class="item fadeIn" data-wow-duration=".4s" data-wow-delay=".3s">
                                        <a class="fcb" href="{{ $content->image }}" data-fancybox="images">
                                            <img id="2" class=" w-100" src="{{ $content->image }}" alt="" />
                                        </a>
                                        <div class="post-meta m-0 px-3 py-2">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><a><i class="fa fa-heart"></i>1013</a>
                                                </li>
                                                <li class="list-inline-item"><a><i class="fa fa-comment"></i>18</a>
                                                </li>
                                                <li class="list-inline-item"><a><i class="fa fa-eye"></i>1625</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="px-3 py-1 my-0">{{ $content->title }}</h6>
                                    </div>


                                @endforeach




                            </div>
                        </div>
                    </section>
                </div>
            @elseif($categorys->type==2)
                <div id="{{ Str::of($categorys->title)->slug('-') }}" class="tabcontent tabcontent2">
                    <section class="customer">
                        <div class="container ">
                            <div class="app-screenshots center-align owl-carousel owl-theme row">
                                @foreach ($categorys->contents as $content)


                                    <div class="item  fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                        <div class="post-block">
                                            <a data-fancybox data-type="iframe" data-src="{{ $content->tour360 }}"
                                                href="javascript:;">
                                                <img class=" w-100" src="{{ $content->image }}" alt="" />
                                            </a>
                                            <div class="post-meta m-0 px-3 py-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><a><i class="fa fa-heart"></i>1760</a>
                                                    </li>
                                                    <li class="list-inline-item"><a><i class="fa fa-comment"></i>25</a>
                                                    </li>
                                                    <li class="list-inline-item"><a><i class="fa fa-eye"></i>2287</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="px-3 py-1 my-0">{{ $content->title }}</h6>
                                        </div>
                                    </div>

                                @endforeach




                            </div>

                        </div>
                    </section>
                </div>
            @elseif($categorys->type==3)
                <div id="{{ Str::of($categorys->title)->slug('-') }}" class="tabcontent tabcontent2">
                    <section class="customer">
                        <div class="container ">
                            <div class="app-screenshots center-align owl-carousel owl-theme row">
                                @foreach ($categorys->contents as $content)
                                    <div class="item  fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                        <div class="post-block">
                                            <a data-fancybox data-type="iframe" data-src="{{ $content->scan }}"
                                                href="javascript:;">
                                                <img class=" w-100" src="{{ $content->image }}" alt="" />
                                            </a>
                                            <div class="post-meta m-0 px-3 py-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><a><i class="fa fa-heart"></i>1760</a>
                                                    </li>
                                                    <li class="list-inline-item"><a><i class="fa fa-comment"></i>25</a>
                                                    </li>
                                                    <li class="list-inline-item"><a><i class="fa fa-eye"></i>2287</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="px-3 py-1 my-0">{{ $content->title }}</h6>
                                        </div>
                                    </div>
                                @endforeach




                            </div>

                        </div>
                    </section>
                </div>
            @endif






        @endforeach
    </div>

    </div>
</section>
