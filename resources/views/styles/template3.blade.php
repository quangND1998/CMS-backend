    <section id="solution">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 ml-auto mr-auto text-center topsection_margin wow fadeInUp"
                    data-wow-duration=".2s" data-wow-delay=".1s">
                    <h2 class="heading">{{ $section->title }}</h2>
                    <p>{{ $section->sub_title }}</p>
                </div>
            </div>
            <div class="row">
                @foreach ($section->contents as $content)
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-center wow zoomIn" data-wow-duration=".5s"
                        data-wow-delay=".1s">
                        <div class=" mb-md-5 mb-sm-4">
                            <img src={{ $content->image }}>
                            <h5 class="">{{ $content->title }}</h5>

                        </div>
                    </div>

                @endforeach



            </div>

        </div>
    </section>
