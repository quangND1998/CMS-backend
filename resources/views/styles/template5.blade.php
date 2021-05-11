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
                                
                                @foreach ($section->contents as $contnet)
                                <div class="clients_image">
                                    <div class="image_wrapper"><img class="main_image"
                                            src="{{$contnet->image}}" alt="" /></div>
                                </div>
                                @endforeach
                                
                            
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