<section id="{{Str::of($section->text)->slug('-')}}">
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

                    {{-- <button class="tablinks tablinks1 active" id="defaultOpen"
                        onclick="openCity(event, 'product-demo')">{{ trans('home.vr-showroom.tab-1') }}</button>
                    <button class="tablinks tablinks1"
                        onclick="openCity(event, 'user-manual')">{{ trans('home.vr-showroom.tab-2') }}</button> --}}
                    @foreach ($section->section_category as $categorys)
                        @if ($loop->first)
                            <button class="tablinks tablinks1 active" id="defaultOpen"
                                onclick="openCity(event, '{{ Str::of($categorys->title)->slug('-') }}')">{{ $categorys->title }}</button>
                        @else
                            <button class="tablinks tablinks1"
                                onclick="openCity(event, '{{ Str::of($categorys->title)->slug('-') }}')">{{ $categorys->title }}</button>

                        @endif
                    @endforeach
                </div>



                {{-- @endforeach --}}
                @if (Config::get('app.locale') == 'vn')
                    <p class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp">
                        {{ $section->sub_title_vn }}
                    </p>
                @endif
                @if (Config::get('app.locale') == 'en')
                    <p class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp">
                        {{ $section->sub_title }}
                    </p>
                @endif


            </div>
        </div>
        @foreach ($section->section_category as $categorys)

            @if ($categorys->type == -1)

                <div class="row">
                    <div id="{{ Str::of($categorys->title)->slug('-') }}" class="tabcontent tabcontent1 main">
                        <div class="project">
                            <div class="row grid" id="project-list">
                                @foreach ($categorys->contents as $content)

                                    @if (Config::get('app.locale') == 'vn')
                                        <a>{{ $content->title_vn }}</a>
                                    @endif
                                    @if (Config::get('app.locale') == 'en')
                                        <p class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp">
                                            <a>{{ $content->title }}</a>
                                        </p>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @elseif($categorys->type ==0)




                <div id="{{ Str::of($categorys->title)->slug('-') }}" class="tabcontent tabcontent1">
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
            @elseif ($categorys->type ==2)
                <div id="{{ Str::of($categorys->title)->slug('-') }}" class="tabcontent tabcontent2">
                    <section class="customer">
                        <div class="container ">
                            <div class="app-screenshots center-align owl-carousel owl-theme row">
                                @foreach ($categorys->contents as $content)
                                    @if ($loop->first)
                                        <div class="item ml-auto mr-auto fadeIn" data-wow-duration=".2s"
                                            data-wow-delay=".1s">
                                            <img id={{ $content->id }} onclick="openImage(this.id)" class=" w-100"
                                                src={{ $content->image }} alt="" />
                                            <div class="post-meta m-0 px-3 py-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><a><i class="fa fa-heart"></i>985</a>
                                                    </li>
                                                    <li class="list-inline-item"><a><i class="fa fa-comment"></i>21</a>
                                                    </li>
                                                    <li class="list-inline-item"><a><i class="fa fa-eye"></i>1270</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="px-3 py-1 my-0">{{ $content->title }}</h6>
                                        </div>
                                    @else
                                        <div class="item fadeIn" data-wow-duration=".3s" data-wow-delay=".2s">
                                            <img id={{ $content->id }} onclick="openImage(this.id)" class=" w-100"
                                                src={{ $content->image }} alt="" />
                                            <div class="post-meta m-0 px-3 py-2">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item"><a><i class="fa fa-heart"></i>1343</a>
                                                    </li>
                                                    <li class="list-inline-item"><a><i class="fa fa-comment"></i>21</a>
                                                    </li>
                                                    <li class="list-inline-item"><a><i class="fa fa-eye"></i>1521</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="px-3 py-1 my-0">{{ $content->title }}</h6>
                                        </div>
                                    @endif

                                @endforeach




                            </div>
                        </div>
                    </section>
                </div>
            @endif





        @endforeach
    </div>
    <div class="btn-tab-info col-lg-12 align-items-center">
        <div class="col-xl-5 col-lg-10 col-md-12 ml-md-auto mr-md-auto text-white wow zoomIn" data-wow-duration=".3s"
            data-wow-delay=".2s">
            <div class="text-center btn-tuvan ">
                <a href="javascript:void(0)" id="load-more"
                    class="btn btn-cta btn-lg btn-rounded">{{ trans('home.see-more') }}</a>
            </div>
        </div>
    </div>
    </div>
</section>
