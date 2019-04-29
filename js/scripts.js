(function ($, root, undefined) {

    $(function () {

        'use strict';

        var $window = $(window);



        function is_nav_visible(){
            if ($window.width()>1199) {
                $('header nav').removeClass('visible');
            }
        }
        is_nav_visible();
        $window.on('resize', function(){
            is_nav_visible();
        })



        $('#show_mobile_nav').on('click', function(e){
            e.preventDefault();
            $('#header nav ').toggleClass('visible');
        });


        $('.bxslider').each(function(){
          var $bxslider = $(this);
          // var $bxslider = $('.bxslider');
          console.log($bxslider.children().length );
          var $auto =  ($bxslider.children().length < 2 ) ? false : true;
          console.log($auto);
          $bxslider.bxSlider({
              'pager': false,
              'controls' : false,
              // 'mode' : 'fade',
              'auto' : $auto,
              'mode' : 'fade'
          });
        })




        var $news_bxslider = $('.news_bxslider');
        var $news_auto =  (  $news_bxslider.children().length < 2 ) ? false : true;
        $news_bxslider.bxSlider({
            'pager': false,
            'controls' : !$news_auto,
            // 'mode' : 'fade',
            'auto' : $news_auto
        });



        $window.scroll(function(){

            var windowScroll = $window.scrollTop();

            var $layer = $('.parallax_image');
            var yPos = (windowScroll *   0.25 );
            $layer.css({"transform" : "translate3d(0px, " + yPos + "px, 0px)"});


        });


        $('a.gallery').featherlightGallery({
            openSpeed: 300
        });
        $('a.villa_lightbox').featherlight({
            openSpeed: 300
        });





        $('.branding').each(function(){
            var $this = $(this);
            var $text = $this.html();
            var $start = $text.substring(0, 3);
            var $end = $text.substring(3, $text.length);
            var $html = '<span class="start">' + $start + '</span><span class="end">' + $end + '</span>';
            $this.html($html);
        })

        $('.plus').each(function(){
            var $this = $(this);
            var $id = $this.attr('id');
            var $class= '.' + $id;
            $this.on('click', function(){
                var $this = $(this);
                if($this.hasClass('activeplus')){
                    $this.removeClass('activeplus');
                    $($class).slideUp();
                } else {
                    $('.hidden_tr').slideUp();
                    $('.activeplus').removeClass('activeplus');
                    $this.addClass('activeplus');
                    $($class).slideDown();
                }
            })

        })

        var $svg = $("#villas-individuelles");
        var $villa_trs = $('.villa_tr');

        var $villa_slider = $('.villa_slider').bxSlider({
            'pager': false,
            'controls' : true,
            'auto' : false,
            onSlideAfter: function(slide) {
                $('g', $svg).removeClass('visible');
                showVillaOnSVG(  slide );


            }
        });


        function showVillaOnSVG( $villatr) {
            $('g', $svg).removeClass('visible');
            var $layer = $villatr.data('layer');
            $($layer, $svg).addClass("visible");
            console.log($layer);

        }
        showVillaOnSVG($villa_trs.first());




        $('.villa_tr.unavailable').each(function(){
            var $layer = $(this).data('layer');
            $($layer).addClass( "greyhouse"  );
        })

        $('.villa_tr.booked').each(function(){
            var $layer = $(this).data('layer');
            $($layer).addClass( "lightbrownhouse"  );
        })


        $('.villa_tr').on('touchstart', function(){
            showVillaOnSVG(  $(this) );

        })


        $('g', $svg).on('mouseover', function(){
            // $(this).attr('class', "visible"  );
            var $this = $(this);
            $this.addClass( "half_visible"  );


        }).on('mouseout', function(){
            var $this = $(this);
            // $(this).attr('class', ""  );
            $this.removeClass("half_visible");

        }).on('click', function() {
            // when click on svg, find the villa its referring to and slide the villaslider to the right place
            var $this = $(this);
            var $id = $this.attr('id');
            var $villa = $('.' + $id);
            if ($villa.length > 0) {
                var $index = $villa.data('index');
                $villa_slider.goToSlide($index);
            }

        });




        var $vr_tour_container = $('.vr_tour_container');
        var $full_screen = $('.full_screen');
        $full_screen.on('click', function(e) {
            e.preventDefault();

        });




        $('form#documents_form').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "../wp-content/themes/bellavista/sections/mail.php",
                data: $(this).serializeArray(),
                method: 'POST'
            }).done(function(data) {
                $('#form_message').html(data);
                $('#form_message').show();

            });

        })



    });

})(jQuery, this);


// CHILLY MAP
// CHILLY MAP
function drawNewMap( location ) {
    if (typeof google !== 'undefined') {
        var map_options = {
            zoom: 11,
            mapTypeControl: true,
            scrollwheel: false,
            draggable: true,
            navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map_container =  document.getElementById( location.container  );
        var map = new google.maps.Map( map_container , map_options);

        var latitude = location.lat;
        var longitude = location.lng;
        var latlng = new google.maps.LatLng(  latitude , longitude);
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            title: location.title
        });

        map.setZoom(12);
        map.setCenter( latlng );

    } // end of google defined
} // end of drawNewMap

// CHILLY MAP
// CHILLY MAP
