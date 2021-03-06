    <div class="wrap-header" id="introduction">
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
                        {{-- <a href="{{ url('#contact') }}"
                            class="btn btn-light btn-rounded d-none d-lg-block">{{ trans('home.contact') }}</a> --}}
                        <a href="javascript:void(0)"
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
                        <div class="wow zoomIn bottom-center">
                            <h1 class="text-white strong text-uppercase text-center" data-wow-duration=".2s"
                                data-wow-delay=".1s">{{ trans('home.caption') }}</h1>
        </header>
    </div>
    <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"
        class="vc_row wpb_row vc_row-fluid vc_custom_1557304191682 vc_row-has-fill vc_row-no-padding">
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="integrio_module_spacing">
                        <div class="spacing_size spacing_size-initial" style="height:20px;"></div>
                    </div>
                    <div class="integrio_module_clients clearfix anim-grayscale">
                        <div class="integrio_module_carousel-wrapper">
                            <div id=integrio_carousel_5d42ab0eb2e86 class="integrio_module_carousel pag_align_center">
                                <div class="integrio_carousel_slick"
                                    data-slick='{"slidesToShow":6,"slidesToScroll":1,"infinite":true,"variableWidth":false,"autoplay":true,"autoplaySpeed":"3000","speed":300,"arrows":false,"dots":false,"adaptiveHeight":false,"responsive":[{"breakpoint":1025,"settings":{"slidesToShow":4,"slidesToScroll":1}},{"breakpoint":800,"settings":{"slidesToShow":2,"slidesToScroll":1}},{"breakpoint":480,"settings":{"slidesToShow":1,"slidesToScroll":1}}]}'>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_1.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_2.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_3.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_4.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_5.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_6.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_7.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_8.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_9.png" alt="" /></div>
                                    </div>
                                    <div class="clients_image">
                                        <div class="image_wrapper"><img class="main_image"
                                                src="assets/images/partner/partners_10.png" alt="" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="integrio_module_spacing">
                        <div class="spacing_size spacing_size-initial" style="height:20px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGIN FORM -->
    <div class="wrap-login-form">
        <div class="login-form">
            <div class="form__logo">
                <img src="https://vni.pro.vn/assets/images/vni/faicon.png" alt="">
            </div>
            <form class="mt-5">
                <span>&times;</span>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Enter your password">
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
    <!-- LOGIN FORM -->


    <!-- VIRTUAL SALES GALLERY - VR SHOWROOM  -->
    <section id="vr-showroom">
        <div class="container">
            <div class="row">
                <div class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp" data-wow-duration=".2s"
                    data-wow-delay=".1s">
                    <h2 class="heading">{{ trans('home.vr-showroom.title') }}</h2>

                    <div class="tab">
                        <button class="tablinks tablinks1 active" id="defaultOpen"
                            onclick="openCity(event, 'product-demo')">{{ trans('home.vr-showroom.tab-1') }}</button>
                        <button class="tablinks tablinks1"
                            onclick="openCity(event, 'user-manual')">{{ trans('home.vr-showroom.tab-2') }}</button>
                    </div>
                    <p class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp">
                        {{ trans('home.vr-showroom.sub-title') }}
                    </p>
                </div>
            </div>
            <div class="row">
                <div id="product-demo" class="tabcontent tabcontent1 main">
                    <div class="project">
                        <div class="row grid" id="project-list">


                        </div>
                    </div>
                </div>
            </div>

            <div id="user-manual" class="tabcontent tabcontent1">
                <section class="customer">
                    <div class="container ">
                        <div class="app-screenshots center-align owl-carousel owl-theme row">
                            <div class="item ml-auto mr-auto wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                <iframe class="fame_mobile" width="100%" height="300" allowfullscreen
                                    src="https://www.youtube.com/embed/0aSNM-w4P80"></iframe>
                                <h6 class="text-center mb-3 mt-3">T???ng quan</h6>
                            </div>
                            <div class="item wow fadeIn" data-wow-duration=".3s" data-wow-delay=".2s">
                                <iframe class="fame_mobile" width="100%" height="300"
                                    src="https://www.youtube.com/embed/kf5SPtyYWE0"></iframe>
                                <h6 class="text-center mb-3 mt-3"><a>Sa b??n ???o</a></h6>
                            </div>
                            <div class="item wow fadeIn" data-wow-duration=".4s" data-wow-delay=".3s">
                                <iframe class="fame_mobile" width="100%" height="300" allowfullscreen
                                    src="https://www.youtube.com/embed/zIHB9pq4vZQ"></iframe>
                                <h6 class="text-center mb-3 mt-3"><a>N???i th???t</a></h6>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <div class="btn-tab-info col-lg-12 align-items-center">
            <div class="col-xl-5 col-lg-10 col-md-12 ml-md-auto mr-md-auto text-white wow zoomIn"
                data-wow-duration=".3s" data-wow-delay=".2s">
                <div class="text-center btn-tuvan ">
                    <a href="javascript:void(0)" id="load-more"
                        class="btn btn-cta btn-lg btn-rounded">{{ trans('home.see-more') }}</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- VIRTUAL SALES GALLERY - VR SHOWROOM  -->

    <!-- Section Features -->
    <section id="solution">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 ml-auto mr-auto text-center topsection_margin wow fadeInUp"
                    data-wow-duration=".2s" data-wow-delay=".1s">
                    <h2 class="heading">{{ trans('home.solution.title') }}</h2>
                    <p>{{ trans('home.solution.des') }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-center wow zoomIn" data-wow-duration=".2s"
                    data-wow-delay=".1s">
                    <div class=" mb-md-5 mb-sm-4">
                        <img src="assets/images/icon/money.svg">
                        <h5 class="">{{ trans('home.solution.s1') }}</h5>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-center wow zoomIn" data-wow-duration=".5s"
                    data-wow-delay=".3s">
                    <div class=" mb-md-5 mb-sm-4">
                        <img src="assets/images/icon/360-degree.svg">
                        <h5>{{ trans('home.solution.s3') }}</h5>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-center wow zoomIn" data-wow-duration=".4s"
                    data-wow-delay=".3s">
                    <div class=" mb-md-5 mb-sm-4">
                        <img src="assets/images/icon/24h.svg">
                        <h5>{{ trans('home.solution.s2') }}</h5>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-center wow zoomIn" data-wow-duration=".2s"
                    data-wow-delay=".1s">
                    <div class=" mb-md-5 mb-sm-4">
                        <img src="assets/images/icon/timer.svg">
                        <h5 class="">{{ trans('home.solution.s4') }}</h5>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-center wow zoomIn" data-wow-duration=".5s"
                    data-wow-delay=".3s">
                    <div class=" mb-md-5 mb-sm-4">
                        <img src="assets/images/icon/easy.svg">
                        <h5>{{ trans('home.solution.s5') }}</h5>

                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 text-center wow zoomIn" data-wow-duration=".4s"
                    data-wow-delay=".3s">
                    <div class=" mb-md-5 mb-sm-4">
                        <img src="assets/images/icon/settings.svg">
                        <h5>{{ trans('home.solution.s6') }}</h5>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ml-auto mr-auto topsection_margin text-center">
                    <h2 class="heading">{{ trans('home.process.title') }}</h2>
                    <p>{{ trans('home.process.des') }}
                    </p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 text-center text-lg-right">
                    <div class="service-box icon-right mb-xs-4 wow zoomIn" data-wow-duration=".2s" data-wow-delay=".1s">
                        <i class=""><img src="assets/images/icon_update/step1.svg"></i>
                        <h4 class="m-0">{{ trans('home.process.step1_h3') }}</h4>
                        <p> {{ trans('home.process.step1_h6') }}</p>
                    </div>
                    <div class="service-box icon-right mb-xs-4 wow zoomIn" data-wow-duration=".4s" data-wow-delay=".2s">
                        <i class=""><img src="assets/images/icon_update/step2.svg"></i>
                        <h4 class="m-0">{{ trans('home.process.step2_h3') }}</h4>
                        <p> {{ trans('home.process.step2_h6') }}</p>
                    </div>
                    <div class="service-box icon-right mb-xs-4 wow zoomIn" data-wow-duration=".6s" data-wow-delay=".4s">
                        <i class=""><img src="assets/images/icon_update/step3.svg"></i>
                        <h4 class="m-0">{{ trans('home.process.step3_h3') }}</h4>
                        <p> {{ trans('home.process.step3_h6') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center mb-xs-4 wow zoomIn" data-wow-duration=".3s" data-wow-delay=".2s">
                    <p><img class="img-fluid" src="assets/images/vni/vni.jpg" alt="" /></p>
                </div>
                <div class="col-lg-4 text-center text-lg-left">
                    <div class="service-box icon-left mb-xs-4 wow zoomIn" data-wow-duration=".4s" data-wow-delay=".2s">
                        <i class=""><img src="assets/images/icon_update/step4.svg"></i>
                        <h4 class="m-0">{{ trans('home.process.step4_h3') }}</h4>
                        <p> {{ trans('home.process.step4_h6') }}</p>
                    </div>
                    <div class="service-box icon-left mb-xs-4 wow zoomIn" data-wow-duration=".6s" data-wow-delay=".4s">
                        <i class=""><img src="assets/images/icon_update/step5.svg"></i>
                        <h4 class="m-0">{{ trans('home.process.step5_h3') }}</h4>
                        <p> {{ trans('home.process.step5_h6') }}</p>
                    </div>
                    <div class="service-box icon-left wow zoomIn" data-wow-duration=".8s" data-wow-delay=".6s">
                        <i class=""><img src="assets/images/icon_update/step6.svg"></i>
                        <h4 class="m-0">{{ trans('home.process.step6_h3') }}</h4>
                        <p> {{ trans('home.process.step6_h6') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Features -->

    <!-- 3D CONTENT -->
    <section id="3D-content">
        <div class="container">
            <div class="row">
                <div class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp" data-wow-duration=".2s"
                    data-wow-delay=".1s">
                    <h2 class="heading">{{ trans('home.3D-contents.title') }}</h2>

                    <div class="tab">
                        <button class="tablinks tablinks2 active" id="defaultOpen1"
                            onclick="showContentTab(event, '3D-videos')">{{ trans('home.3D-contents.tab1') }}</button>
                        <button class="tablinks tablinks2"
                            onclick="showContentTab(event, 'perspective-image')">{{ trans('home.3D-contents.tab2') }}</button>
                        <button class="tablinks tablinks2"
                            onclick="showContentTab(event, 'tour360')">{{ trans('home.3D-contents.tab3') }}</button>
                    </div>
                    <p class="tab col-lg-12 ml-auto mr-auto text-center wow fadeInUp">
                        {{ trans('home.project-sample.tab1_des') }}
                    </p>
                </div>
            </div>
            <div class="row">
                <div id="3D-videos" class="tabcontent tabcontent2">
                    <section class="customer">
                        <div class="container ">
                            <div class="app-screenshots center-align owl-carousel owl-theme row">
                                <div class="item ml-auto mr-auto wow fadeIn" data-wow-duration=".2s"
                                    data-wow-delay=".1s">
                                    <iframe class="fame_mobile" width="100%" height="300" allowfullscreen
                                        src="https://www.youtube.com/embed/Bf0jXixd950"></iframe>

                                    <div class="post-meta m-0 px-3 py-2">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a><i class="fa fa-heart"></i>1147</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-comment"></i>24</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-eye"></i>4211</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="px-3 py-1 my-0">Flamingo The Legend</h6>
                                </div>
                                <div class="item wow fadeIn" data-wow-duration=".3s" data-wow-delay=".2s">
                                    <iframe class="fame_mobile" width="100%" height="300"
                                        src="https://www.youtube.com/embed/hOeKhllGlmI"></iframe>

                                    <div class="post-meta m-0 px-3 py-2">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a><i class="fa fa-heart"></i>1343</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-comment"></i>21</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-eye"></i>2975</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="px-3 py-1 my-0"><a>Vinhomes Ocean Park</a></h6>
                                </div>
                                <div class="item wow fadeIn" data-wow-duration=".4s" data-wow-delay=".3s">
                                    <iframe class="fame_mobile" width="100%" height="300" allowfullscreen
                                        src="https://www.youtube.com/embed/ZpomEFPKiZo"></iframe>

                                    <div class="post-meta m-0 px-3 py-2">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a><i class="fa fa-heart"></i>1478</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-comment"></i>19</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-eye"></i>3161</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="px-3 py-1 my-0"><a>BIM Group - Aqua City Halong</a></h6>
                                </div>
                                <div class="item wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                    <iframe class="fame_mobile" width="100%" height="300" allowfullscreen
                                        src="https://www.youtube.com/embed/XuVMOXZSGaU"></iframe>

                                    <div class="post-meta m-0 px-3 py-2">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a><i class="fa fa-heart"></i>1027</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-comment"></i>31</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-eye"></i>2136</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="px-3 py-1 my-0"><a>Sun Grand City Hillside Residences</a></h6>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div id="perspective-image" class="tabcontent tabcontent2">
                    <section class="customer">
                        <div class="container ">
                            <div class="app-screenshots center-align owl-carousel owl-theme row">
                                <div class="item ml-auto mr-auto fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                    <img id="0" onclick="openImage(this.id)" class=" w-100"
                                        src="assets/images/vni/congtrinh/1.jpg" alt="" />
                                    <div class="post-meta m-0 px-3 py-2">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a><i class="fa fa-heart"></i>985</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-comment"></i>21</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-eye"></i>1270</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="px-3 py-1 my-0"> Urban Planning Images</h6>
                                </div>
                                <div class="item fadeIn" data-wow-duration=".3s" data-wow-delay=".2s">
                                    <img id="1" onclick="openImage(this.id)" class=" w-100"
                                        src="assets/images/vni/congtrinh/2.jpg" alt="" />
                                    <div class="post-meta m-0 px-3 py-2">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a><i class="fa fa-heart"></i>1343</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-comment"></i>21</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-eye"></i>1521</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="px-3 py-1 my-0">Lowrise Building Images</h6>
                                </div>
                                <div class="item  fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                    <img id="3" onclick="openImage(this.id)" class=" w-100"
                                        src="assets/images/vni/congtrinh/4.jpg" alt="" />
                                    <div class="post-meta m-0 px-3 py-2">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a><i class="fa fa-heart"></i>701</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-comment"></i>16</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-eye"></i>2389</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="px-3 py-1 my-0">Highrise Building Images</h6>
                                </div>
                                <div class="item fadeIn" data-wow-duration=".4s" data-wow-delay=".3s">
                                    <img id="2" onclick="openImage(this.id)" class=" w-100"
                                        src="assets/images/vni/congtrinh/3.jpg" alt="" />
                                    <div class="post-meta m-0 px-3 py-2">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item"><a><i class="fa fa-heart"></i>1013</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-comment"></i>18</a></li>
                                            <li class="list-inline-item"><a><i class="fa fa-eye"></i>1625</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="px-3 py-1 my-0">Interior Images</h6>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div id="tour360" class="tabcontent tabcontent2">
                    <section class="customer">
                        <div class="container ">
                            <div class="app-screenshots center-align owl-carousel owl-theme row">
                                <div class="item fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                    <div class="post-block">
                                        <img id="0" onclick="openTour360(this.id)" class=" w-100"
                                            src="assets/images/vni/thumb/sun_village.PNG" alt="" />
                                        <div class="post-meta m-0 px-3 py-2">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><a><i class="fa fa-heart"></i>1760</a></li>
                                                <li class="list-inline-item"><a><i class="fa fa-comment"></i>25</a></li>
                                                <li class="list-inline-item"><a><i class="fa fa-eye"></i>2287</a></li>
                                            </ul>
                                        </div>
                                        <h6 class="px-3 py-1 my-0">Sun Premier Village Primavera</h6>
                                    </div>
                                </div>
                                <div class="item fadeIn" data-wow-duration=".3s" data-wow-delay=".2s">
                                    <div class="post-block">
                                        <img id="1" onclick="openTour360(this.id)" class=" w-100"
                                            src="assets/images/vni/thumb/the-sol-city.PNG" alt="" />
                                        <div class="post-meta m-0 px-3 py-2">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><a><i class="fa fa-heart"></i>1673</a></li>
                                                <li class="list-inline-item"><a><i class="fa fa-comment"></i>11</a></li>
                                                <li class="list-inline-item"><a><i class="fa fa-eye"></i>2325</a></li>
                                            </ul>
                                        </div>
                                        <h6 class="px-3 py-1 my-0">The SOL City</h6>
                                    </div>
                                </div>
                                <div class="item fadeIn" data-wow-duration=".4s" data-wow-delay=".3s">
                                    <div class="post-block">
                                        <img id="2" onclick="openTour360(this.id)" class=" w-100"
                                            src="assets/images/vni/thumb/gem-sky-world.PNG" alt="" />
                                        <div class="post-meta m-0 px-3 py-2">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><a><i class="fa fa-heart"></i>1746</a></li>
                                                <li class="list-inline-item"><a><i class="fa fa-comment"></i>22</a></li>
                                                <li class="list-inline-item"><a><i class="fa fa-eye"></i>2534</a></li>
                                            </ul>
                                        </div>
                                        <h6 class="px-3 py-1 my-0">Gem Sky World</h6>
                                    </div>
                                </div>
                                <div class="item  fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                    <div class="post-block">
                                        <img id="3" onclick="openTour360(this.id)" class=" w-100"
                                            src="assets/images/vni/thumb/aria-dn.PNG" alt="" />
                                        <div class="post-meta m-0 px-3 py-2">
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item"><a><i class="fa fa-heart"></i>915</a></li>
                                                <li class="list-inline-item"><a><i class="fa fa-comment"></i>11</a></li>
                                                <li class="list-inline-item"><a><i class="fa fa-eye"></i>1252</a></li>
                                            </ul>
                                        </div>
                                        <h6 class="px-3 py-1 my-0">Aria ???? N???ng</h6>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>
                </div>
            </div>

        </div>
    </section>
    <!-- 3D CONTENT -->


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

            <img class="mySlides" src="assets/images/project/1.png" style="width:100%">
            <img class="mySlides" src="assets/images/project/2.jpg" style="width:100%">
            <img class="mySlides" src="assets/images/project/3.jpg" style="width:100%">
            <img class="mySlides" src="assets/images/project/4.png" style="width:100%">

            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
        </div>

    </div>

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

    </div>
