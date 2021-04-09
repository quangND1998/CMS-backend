"use strict";

is_visible_init ();
integrio_slick_navigation_init();

jQuery(document).ready( function($) {
	integrio_split_slider();
	integrio_sticky_init();
	integrio_search_init();
	integrio_side_panel_init();
	integrio_mobile_header();
	integrio_woocommerce_helper();
	integrio_woocommerce_tools();
	integrio_woocommerce_filters();
	integrio_woocommerce_tabs();
	integrio_woocommerce_login_in();
	integrio_init_timeline_appear();
	integrio_init_timeline_horizontal_appear();
	integrio_init_ico_progress_appear();
	integrio_progress_bars_init();
	integrio_carousel_slick();
	integrio_counter_init();
	integrio_countdown_init ();
	integrio_circuit_services();
	integrio_circuit_services_resize();
	integrio_img_layers();
	integrio_page_title_parallax();
	integrio_extended_parallax();
	integrio_portfolio_parallax();
	integrio_message_anim_init();
	integrio_scroll_up();
	integrio_link_scroll();
	integrio_skrollr_init();
	integrio_sticky_sidebar ();
	integrio_videobox_init ();
	integrio_parallax_video();
	wgl_timeTabs();
	integrio_select_wrap();
	integrio_button_wrap();
	jQuery( '.wgl_module_title .carousel_arrows' ).integrio_slick_navigation();
	jQuery( '.wgl-products > .carousel_arrows' ).integrio_slick_navigation();
	jQuery( '.integrio_module_custom_image_cats > .carousel_arrows' ).integrio_slick_navigation();
	integrio_menu_lavalamp();
	integrio_scroll_animation();
	integrio_woocommerce_mini_cart();
	integrio_woocommerce_notifications();
	integrio_dynamic_styles();
});

jQuery(window).on("load", function() {
	integrio_isotope();
	integrio_blog_masonry_init();
	setTimeout(function(){
		jQuery('#preloader-wrapper').fadeOut();
	},1100);
	particles_custom();

	jQuery(".wgl-currency-stripe_scrolling").each(function(){
    	jQuery(this).simplemarquee({
	        speed: 40,
	        space: 0,
	        handleHover: true,
	        handleResize: true
	    });
    })
});
