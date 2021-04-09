<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>VNi - Mobile Sales kit for Real estate</title>
    <meta name="description" content="VNi - Mobile Sales kit for Real estate">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <!-- Define default CSS path (you will run into CSS error without this) -->
    <base href="{{ asset('') }}">
    <link rel="icon" href="assets/images/vni/faicon.png">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/dist/css/plugins.min.css" />
    <!-- Main Template CSS -->
    <link rel="stylesheet" href="assets/css/main.css" id="zero_color" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/update.css">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="assets/css/slider.css">
    <link rel="stylesheet" href="assets/css/product.css">
    <!-- Style Switch CSS -->
    <link rel="stylesheet" href="zero-styleswitch/style.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="assets/css/partner.css" />
    <script src="assets/js/jquery.js"></script>
    <style>
        button:focus {
            outline: inherit;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            width: 100%;
        }

        .tabcontent_image {
            display: none;
            width: 100%;
        }

        #tieuchuan {
            display: block;
        }

        button {
            background-color: inherit;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            margin-bottom: 20px;
            transition: 0.3s;
            font-size: 17px;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126581925-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126581925-2');
</script>

</head>

<body class="transparent-header" data-spy="scroll" data-offset="75" data-target="#navbarCollapse">
    <!-- Loader -->

        @yield('content')

        @include('client.layout.footer')

    <script src="assets/plugins/dist/js/plugins.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <!-- Style Switch JS -->
    <script src="zero-styleswitch/script.js"></script>
    <script type='text/javascript' src='assets/js/theme/theme-addons.min.js'></script>
    <script type='text/javascript' src='assets/js/theme/theme.js?ver=5.2.2'></script>
    <script type='text/javascript' src='assets/js/theme/jquery.appear.js?ver=5.2.2'></script>
    <script type='text/javascript' src='assets/js/theme/slick.min.js?ver=5.2.2'></script>
    <script type='text/javascript' src='assets/js/theme/jquery.paroller.min.js?ver=5.2.2'></script>
    <script>
        var language = window.navigator.userLanguage || window.navigator.language;
    </script>
    <script>
        var video = document.getElementById("myVideo");
        var btn = document.getElementById("myBtn");
        var array = [
            'https://vni.pro.vn/duan/SunPrimavera/index.html',
            'https://vni.pro.vn/duan/SolCity/final/tour.html',
            'https://vni.pro.vn/duan/GemSkyWorld/final/tour.html',
            'https://vni.pro.vn/duan/AriaDanang/v1/index.html',
            'https://vni.pro.vn/3dscan/TheSolCity_SolRiver_TwoBedroom_75m2.html',
            'https://vni.pro.vn/3dscan/TheSolCity_Shophouse_Threebedroom_70m2.html',
            'https://vni.pro.vn/3dscan/Dragan_Tang23_CanE.html',
            'https://vni.pro.vn/3dscan/BienhoaUniverseComplex_Threebedroom.html'
        ];
        // var array = [

        //     'http://holomia.com/duan/vinhomes_Skylake/index.html',
        //     'http://sailingclubvillasphuquoc.vn/3dtour/index.html',
        //     'http://holomia.com/duan/D-One%20Saigon/final/',
        //     'http://holomia.com/duan/SunDTH/Ver11/SunDTH_360.html',

        // ];

        function myFunction() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }

        function openImage(id) {
            document.getElementById("slider-image").style.visibility = "visible";
            //            document.getElementById("frame_detail").src = array[id];

        }

        function closeImage() {
            document.getElementById("slider-image").style.visibility = "hidden";

        }

        function openImage_pre(id) {
            document.getElementById("slider_image_pre").style.visibility = "visible";
            //            document.getElementById("frame_detail").src = array[id];

        }

        function closeImage_pre() {
            document.getElementById("slider_image_pre").style.visibility = "hidden";

        }

        function openImage_standard(id) {
            document.getElementById("slider_image_standard").style.visibility = "visible";
            //            document.getElementById("frame_detail").src = array[id];

        }

        function closeImage_standard() {
            document.getElementById("slider_image_standard").style.visibility = "hidden";

        }

        /*tour 360*/
        function openTour360(id) {
            unmute();
            document.getElementById("slider-tour360").style.visibility = "visible";
            document.getElementById("slidetour360").src = array[id];

        }

        function closeTour360() {
            document.getElementById("slider-tour360").style.visibility = "hidden";
            mute();

        }
        var iframe_bk;
        //play status
        var status = 1;

        function mute() {
            if (status != 1) return;
            var iframe = $("#slidetour360");
            iframe_bk = iframe.clone();
            iframe.remove();

            status = 0;
        }

        function unmute() {
            if (status != 0) return;
            if (iframe_bk) {
                $(".content-tour360").append(iframe_bk);
                iframe_bk = null;
                status = 1;
            }
        }
    </script>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);
        showDivs_pre(slideIndex);
        showDivs_standard(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if( x != null){
                if (n > x.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x[slideIndex - 1].style.display = "block";
            }
        }
        /*pre*/
        function plusDivs_pre(n) {
            showDivs_pre(slideIndex += n);
        }

        function showDivs_pre(n) {
            console.log(slideIndex);
            var i;
            var x = document.getElementsByClassName("mySlides_pre");
            if( x != null){
                if (n > x.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x[slideIndex - 1].style.display = "block";
            }
        }
        /*standard*/
        function plusDivs_standard(n) {
            showDivs_standard(slideIndex += n);
        }

        function showDivs_standard(n) {
            console.log(slideIndex);
            var i;
            var x = document.getElementsByClassName("mySlides_standard");
                if( x != null){
                    if (n > x.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = x.length
                    }
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    x[slideIndex - 1].style.display = "block";
                }

        }
    </script>
    <script>
        function openCity(evt, el) {
           let i, tabcontent1, tablinks1;
            tabcontent1 = document.getElementsByClassName("tabcontent1");
            for (i = 0; i < tabcontent1.length; i++) {
                tabcontent1[i].style.display = "none";
            }
            tablinks1 = document.getElementsByClassName("tablinks1");
            for (i = 0; i < tablinks1.length; i++) {
                tablinks1[i].className = tablinks1[i].className.replace(" active", "");
            }
            document.getElementById(el).style.display = "block";
            evt.currentTarget.className += " active";
        }

        function showContentTab(evt, el) {
            let i, tabcontent2, tablinks2;
            tabcontent2 = document.getElementsByClassName("tabcontent2");
            for (i = 0; i < tabcontent2.length; i++) {
                tabcontent2[i].style.display = "none";
            }
            tablinks2 = document.getElementsByClassName("tablinks2");
            for (i = 0; i < tablinks2.length; i++) {
                tablinks2[i].className = tablinks2[i].className.replace(" active", "");
            }
            document.getElementById(el).style.display = "block";
            evt.currentTarget.className += " active";
        }


        if(document.getElementById("defaultOpen") != null){
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        }
        if(document.getElementById("defaultOpen1") != null){
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen1").click();
        }


    </script>
    <script>
        function openCity_img(evt_img, city_image) {
            var j, tabcontent_img, tablinks_img;
            tabcontent_img = document.getElementsByClassName("tabcontent_image");
            for (j = 0; j < tabcontent_img.length; j++) {
                tabcontent_img[j].style.display = "none";
            }
            tablinks_img = document.getElementsByClassName("tablinks_img");
            for (j = 0; j < tablinks_img.length; j++) {
                tablinks_img[j].className = tablinks_img[j].className.replace(" active", "");
            }
            document.getElementById(city_image).style.display = "block";
            evt_img.currentTarget.className += " active";
        }

        if(document.getElementById("defaultOpen_img") != null){
            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen_img").click();
        }
    </script>
    {{-- <script>
        $(".btn-login").click(function() {
            $(".wrap-login-form").fadeIn();
        })
        $(".login-form span").click(function() {
            $(".wrap-login-form").fadeOut();
        })
    </script> --}}
</body>
