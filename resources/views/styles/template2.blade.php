<section id="vr-showroom">
    <div class="container">
        <div class="row">
            <div class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp" data-wow-duration=".2s"
                data-wow-delay=".1s">
                <h2 class="heading">{{ trans('home.vr-showroom.title') }}</h2>

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
                <p class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp">
                    {{ $section->sub_title }}
                </p>
            </div>
        </div>
        @foreach ($section->section_category as $categorys)

            @if (count($categorys->contents) != 0 && $categorys->contents[0]->video == null)

                <div class="row">
                    <div id="{{ Str::of($categorys->title)->slug('-') }}" class="tabcontent tabcontent1 main">
                        <div class="project">
                            <div class="row grid" id="project-list">
                                @foreach ($categorys->contents as $content)
                                    <a>{{ $content->title }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @else




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
