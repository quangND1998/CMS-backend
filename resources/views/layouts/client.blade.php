<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VR Showroom @yield('title')</title>
    <base href="{{ asset('') }}">

    {{-- <meta property="og:url" content="@yield('meta-url')" /> --}}
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('meta-title')" />
    <meta property="og:site_name" content="VNi" />
    <meta property="og:image"
        content="https://my.matterport.com/api/v1/player/models/@yield('model-code-head')/thumb" />

    <link rel="icon" href="assets/logo/faicon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />



    <link rel="stylesheet" href="client/assets/css/main-style.css" />
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void(0)"><img src="client/assets/images/logo.png" class="w-100"
                        alt="" /></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" aria-current="page" href="#">VR Space</a>
                        </li>
                    </ul>
                    <div class="btn-box">
                        <button type="button" class="btn btn-white btn-share fb-share-button"
                            title="Share with Facebook">
                            <img src="client/assets/images/share.svg" class="w-100" alt="" />
                        </button>
                        <button type="button" class="btn btn-white btn-fullscreen" title="Fullscreen">
                            <img src="client/assets/images/full-screen.svg" class="w-100" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="content">
            <iframe src="https://my.matterport.com/show/?m=@yield('model-code-body')&play=1&qs=1"
                frameborder="0"></iframe>
            <div class="content__img">
                <img src="client/assets/images/logo.png" class="w-100" alt="">
            </div>
        </section>
    </main>


    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    <script src="client/assets/js/main-js.js"></script>
</body>

</html>
