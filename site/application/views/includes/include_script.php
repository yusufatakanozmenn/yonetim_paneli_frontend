<script src="<?php echo base_url("assets");?>/js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
<script src="<?php echo base_url("assets");?>/js/bootstrap.min.js"></script><!-- .bootstrap script -->
<script src="<?php echo base_url("assets");?>/js/jquery.scripts.min.js"></script><!-- modernizr, retina, stellar for parallax -->
<script src="<?php echo base_url("assets");?>/masterslider/masterslider.min.js"></script><!-- Master slider main js -->
<script src="<?php echo base_url("assets");?>/masterslider/jquery.easing.min.js"></script><!-- Master slider easing js -->
<script src="<?php echo base_url("assets");?>/js/jquery.magnific-popup.min.js"></script><!-- used for image lightbox -->
<script src="<?php echo base_url("assets");?>/owl-carousel/owl.carousel.min.js"></script><!-- Carousels script -->
<script src="<?php echo base_url("assets");?>/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
<script src="<?php echo base_url("assets");?>/js/include.js"></script><!-- custom js functions -->
<script src="<?php echo base_url("assets");?>/js/instagram-stream.jquery.js"></script><!-- instagram stream plugin -->
<script src="<?php echo base_url("assets");?>/js/TweenMax.min.js"></script> <!-- Plugin for smooth scrolling-->
<script src="<?php echo base_url("assets");?>/js/retina.min.js"></script><!-- retina images script -->
<script src="<?php echo base_url("assets");?>/js/ScrollToPlugin.min.js"></script> <!-- Plugin for smooth scrolling-->

<script>
/* <![CDATA[ */
jQuery(document).ready(function($) {
    'use strict';
    // MASTER SLIDER START
    var slider = new MasterSlider();
    slider.setup('masterslider', {
        width: 1920, // slider standard width
        height: 1080, // slider standard height
        space: 0,
        layout: "fullwidth",
        speed: 50,
        centerControls: false,
        loop: false,
        autoplay: false,
        parallaxMode: "mouse"
        // more slider options goes here...
        // check slider options section in documentation for more options.
    });
    // adds Arrows navigation control to the slider.
    MSScrollParallax.setup(slider, 50, 80, true);

    //GALLERY LIGHTBOX
    $('.triggerZoom').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    // EVENTS CAROUSEL START 
    $("#events-carousel").owlCarousel({
        singleItem: true,
        pagination: true,
        autoPlay: true
    });

    // BOOKING FORM AJAX SUBMIT START
    $('.otw-widget-form .otw-submit').on('click', function(event) {
        event.preventDefault();
        var $form = $(this).closest('form');

        var name = $form.find('.otw-reservation-name').val();
        var email = $form.find('.otw-reservation-email').val();
        var date = $form.find('.otw-reservation-date').val();
        var time = $form.find('.otw-reservation-time').val();
        var guests = $form.find('.otw-party-size-select').val();
        var form_data = new Array({
            'Name': name,
            'Email': email,
            'Date': date,
            'Time': time,
            'Guests': guests
        });
        $.ajax({
            type: 'POST',
            url: "contact.php",
            data: ({
                'action': 'book_table',
                'form_data': form_data
            })
        }).done(function(data) {
            alert(data);
        });
    }); // BOOKING FORM AJAX SUBMIT END

    // INSTAGRAM STREAM START 
    $('.instagram-stream').instagramstream({
        limit: 22, // number of images to fetch
        username: 'yourusername', // your username
        overlay: true, // add overlay layer of hover effect
        textContainer: '.is-text', // default: '.is-text', pass jQuery object or selector
        textPosition: '10', // place that at this position
        textSize: '4', // size of text e.g. 1 - has size like one image; 2 - has size of two images etc.
        imageQuality: 'standard', // standard | low | thumbnail; standard: 640 x 640px; low: 320 x 320px; thumbnail: 150 x 150px
        accessToken: '' // your access token
    });

});
/* ]]> */
</script>