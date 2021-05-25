@extends('client.layout.index')

@section('content')
</header>
    <nav class="navbar navbar-expand-lg navbar-sticky">
        <div class="container">
                <a class="navbar-brand" href="{{url('/')}}"><img class="img-fluid" src="assets/images/vni/logo_vni.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav ml-auto mr-auto">
                            <li class="nav-item"><a class="nav-link" data-scroll href="{{url('/')}}">{{ trans('product.header.intro') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-scroll href="{{url('#3D-content')}}">{{ trans('product.header.tour_360') }}</a></li>
                        </ul>
                <a href="#contact" class="btn btn-light btn-rounded d-none d-lg-block">{{ trans('home.contact') }}</a>

            </div>
        </div>
        <li class=" navbar-nav nav-item flat">
            <a href="{{url(Request::getPathInfo().'?lang=en')}}"><img src="assets/images/flat/en.png"></a>
            <a href="{{url(Request::getPathInfo().'?lang=vn')}}"><img src="assets/images/flat/vn.png"></a>
        </li>
    </nav>
</header>
<section id="home" class="parallax-fixed main-banner-product bg-videos video-placeholder">
</section>
@if ( Config::get('app.locale') == 'vn')
<section id="blogs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 ml-auto mr-auto ">

                        <h2 class="text-uppercase">{{ $tintuc->TieuDe }}</h2>
                        <div class="post-meta">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><i class="fa fa-user" aria-hidden="true"></i>By Holomia</li>
                                <li class="list-inline-item"><i class="fa fa-calendar"></i>
                                    @if(!empty($tintuc->created_at))
                                        {{ $tintuc->created_at }}
                                    @else
                                        {{ 'Không Xác Định' }}
                                    @endif
                                </li>
                                <li class="list-inline-item"><i class="fa fa-tag"></i>Categories {{$tintuc->LoaiTin->Theloai->Ten}}</li>
                            </ul>
                        </div>
                        <!-- if url lang = en or lang = vn  -->

                        <div class="col-lg-12 ml-auto mr-auto  owl-theme">
                            <div class="item wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                <div class="post-block">
                                    <div class="">
                                        <a href="#" class="">
                                            <img class="img-news w-100" src="{{ $tintuc->Hinh }}" alt="" />
                                        </a>
                                    </div>
                                    <!-- Post Content -->
                                    <p class="lead">
                                        {!! $tintuc->TomTat !!}
                                    </p>

                                    <p>
                                        {!! $tintuc->NoiDung !!}
                                    </p>

                                </div>
                                <!-- Comments Form -->
                                @if(Auth::user())
                                    <div class="well">
                                        <h4>Viết bình luận ...<i class="fa fa-pencil" aria-hidden="true"></i></h4>
                                        @if(count($errors) > 0)
                                            @foreach($errors->all() as $err)
                                            <div class="alert alert-danger" style="margin-top: 1em;">
                                                <strong>{{ $err }}</strong><br/>
                                            </div>
                                            @endforeach
                                        @endif

                                        @if(session('message'))
                                        <div class="alert alert-success">
                                            <strong>{{ session('message') }}</strong>
                                        </div>
                                        @endif
                                        <form role="form" method="POST" action="comment/{{ $tintuc->id }}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <textarea name="content" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Gửi</button>
                                        </form>
                                    </div>
                                @endif

                                <hr>

                                <!-- Posted Comments -->

                                @foreach($tintuc->Comment as $binhluan)
                                    <!-- Comment -->
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                {{ $binhluan->User->name }} |
                                                <small>{{ $binhluan->created_at }}</small>
                                            </h4>
                                            {{ $binhluan->NoiDung }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 ml-auto mr-auto">
                    <div class="panel panel-default">
                            <div class="panel-heading"><b>Tin liên quan</b></div>
                                <div class="panel-body">
                                    @foreach($tinlienquan as $tlq)
                                        <!-- item -->
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-md-12">
                                                <a href="tin-tuc/{{ $tlq->TieuDeKhongDau }}.html">
                                                    <img class="img-fluid" src="{{ $tlq->Hinh }}" alt="Hình ảnh của bài viết">
                                                </a>
                                            </div>
                                            <div class="col-md-12">
                                                <a href="tin-tuc/{{ $tlq->TieuDeKhongDau }}.html"><b>{{ $tlq->TieuDe }}</b></a>
                                            </div>

                                            <div class="break"></div>
                                        </div>
                                        <!-- end item -->
                                    @endforeach
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Tin nổi bật</b></div>
                                <div class="panel-body">
                                    @foreach($tinnoibat as $tnb)
                                        <!-- item -->
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-md-12">
                                                <a href="tin-tuc/{{ $tnb->TieuDeKhongDau }}.html">
                                                    <img class="img-fluid" src="{{ $tnb->Hinh }}" alt="Hình ảnh của bài viết">
                                                </a>
                                            </div>
                                            <div class="col-md-12">
                                                <a href="tin-tuc/{{ $tnb->TieuDeKhongDau }}.html"><b>{{ $tnb->TieuDe }}</b></a>
                                            </div>

                                            <div class="break"></div>
                                        </div>
                                        <!-- end item -->
                                    @endforeach

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
@endif
 @if ( Config::get('app.locale') == 'en')
 <section id="blogs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 ml-auto mr-auto ">

                        <h2 class="text-uppercase">{{ $tintuc->TieuDe_en }}</h2>
                        <div class="post-meta">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><i class="fa fa-user" aria-hidden="true"></i>By Holomia</li>
                                <li class="list-inline-item"><i class="fa fa-calendar"></i>
                                    @if(!empty($tintuc->created_at))
                                        {{ $tintuc->created_at }}
                                    @else
                                        {{ 'Không Xác Định' }}
                                    @endif
                                </li>
                                <li class="list-inline-item"><i class="fa fa-tag"></i>Categories {{$tintuc->LoaiTin->Theloai->Ten}}</li>
                            </ul>
                        </div>
                        <!-- if url lang = en or lang = vn  -->

                        <div class="col-lg-12 ml-auto mr-auto  owl-theme">
                            <div class="item wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
                                <div class="post-block">
                                    <div class="">
                                        <a href="#" class="">
                                            <img class="img-news w-100" src="{{ $tintuc->Hinh }}" alt="" />
                                        </a>
                                    </div>
                                    <!-- Post Content -->
                                    <p class="lead">
                                        {!! $tintuc->TomTat_en !!}
                                    </p>

                                    <p>
                                        {!! $tintuc->NoiDung_en !!}
                                    </p>

                                </div>
                                <!-- Comments Form -->
                
                                @if(Auth::user())

                                    <div class="well">
                                        <h4>write a comment<i class="fa fa-pencil" aria-hidden="true"></i></h4>
                                        @if(count($errors) > 0)
                                            @foreach($errors->all() as $err)
                                            <div class="alert alert-danger" style="margin-top: 1em;">
                                                <strong>{{ $err }}</strong><br/>
                                            </div>
                                            @endforeach
                                        @endif
                                        @if(session('message'))
                                        <div class="alert alert-success">
                                            <strong>{{ session('message') }}</strong>
                                        </div>
                                        @endif
                                        <form role="form" method="POST" action="comment/{{ $tintuc->id }}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <textarea name="content" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </form>
                                    </div>
                                @endif

                                <hr>

                                <!-- Posted Comments -->

                                @foreach($tintuc->Comment as $binhluan)
                                    <!-- Comment -->
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                {{ $binhluan->User->name }} |
                                                <small>{{ $binhluan->created_at}}</small>
                                            </h4>
                                            {{ $binhluan->NoiDung }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 ml-auto mr-auto">
                    <div class="panel panel-default">
                            <div class="panel-heading"><b>Related news</b></div>
                                <div class="panel-body">
                                    @foreach($tinlienquan as $tlq)
                                        <!-- item -->
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-md-12">
                                                <a href="{{ $tlq->TieuDeKhongDau }}.html">
                                                    <img class="img-fluid" src="{{ $tlq->Hinh }}" alt="Hình ảnh của bài viết">
                                                </a>
                                            </div>
                                            <div class="col-md-12">
                                                <a href="{{ $tlq->TieuDeKhongDau }}.html"><b>{{ $tlq->TieuDe_en }}</b></a>
                                            </div>

                                            <div class="break"></div>
                                        </div>
                                        <!-- end item -->
                                    @endforeach
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Hot news</b></div>
                                <div class="panel-body">
                                    @foreach($tinnoibat as $tnb)
                                        <!-- item -->
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col-md-12">
                                                <a href="tin-tuc/{{ $tnb->TieuDeKhongDau }}.html">
                                                    <img class="img-fluid" src="{{ $tnb->Hinh }}" alt="Hình ảnh của bài viết">
                                                </a>
                                            </div>
                                            <div class="col-md-12">
                                                <a href="tin-tuc/{{ $tnb->TieuDeKhongDau }}.html"><b>{{ $tnb->TieuDe_en }}</b></a>
                                            </div>

                                            <div class="break"></div>
                                        </div>
                                        <!-- end item -->
                                    @endforeach

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
@endif
@endsection
