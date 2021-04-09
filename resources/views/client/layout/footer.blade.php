<section id="contact" class="bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ml-auto mr-auto text-center wow fadeInUp">
                <h2 class="text-white text-uppercase">{{ trans('home.footer.title') }}</h2>
                <p>{{ trans('home.footer.des') }}
                </p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-xl-10 mr-auto ml-auto">
                <div class="row">
                    <div class="col-md-3 col-lg-3 wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">
                        <img src="assets/images/vni/logo_2.png">
                    </div>
                    <div class="col-md-5 col-lg-5 wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">
                        <div class="address-block mb-2">
                            <i class="lnr lnr-map-marker"></i>
                            <p class="lead"> {{ trans('home.footer.add1') }}</p>
                        </div>
                        <div class="address-block mb-2">
                            <i class="lnr lnr-map-marker"></i>
                            <p class="lead">{{ trans('home.footer.add2') }}</p>
                        </div>
                        <div class="address-block mb-2">
                            <i class="lnr lnr-envelope"></i>
                            <p class="lead">{{ trans('home.footer.email') }}<br />
                            </p>
                        </div>
                        <div class="address-block mb-2">
                            <i class="lnr lnr-phone-handset"></i>
                            <p class="lead">Hotline: {{ trans('home.footer.hotline') }}<br /></p>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 wow fadeInUp">
                        <form id="contact-form" action="message/send" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="contact_name" id="message_name" class="form-control"
                                    placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="contact_email" id="message_email" class="form-control"
                                    placeholder="E-mail Address">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="contact_message" id="message_message"
                                    placeholder="Your Message" rows="5" cols="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-cta text-uppercase">submit</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- Footer -->
<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row text-lg-left text-center">
            <div class="col-12 col-lg-6">
                <span class="copyright">Copyright @ 2019 <a href="#">VNi 3D Technology Co.,tld.</a> | All right
                    reserved. </span>
            </div>
            <div class="col-12 col-lg-6 text-center text-lg-right">
                <ul class="list-inline my-auto social">
                    <li class="list-inline-item pr-2"><a href="https://www.facebook.com/VNipro"
                            class="facebook social-item" title="facebook" target="_blank"><i
                                class="fa fa-facebook"></i></a></li>
                    <li class="list-inline-item pr-2"><a href="#" class="twitter social-item" title="twitter"
                            target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item pr-2"><a href="#" class="dribbble social-item" title="dribbble"
                            target="_blank"><i class="fa fa-dribbble"></i></a></li>
                    <li class="list-inline-item pr-2"><a href="#" class="pinterest social-item" title="pinterest"
                            target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                    <li class="pr-0 list-inline-item pr-0"><a href="#" class="linkedin social-item" title="linkedin"
                            target="_blank"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
