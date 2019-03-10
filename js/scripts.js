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

        $('.bxslider').bxSlider({
            'pager': false,
            'controls' : true,
            // 'mode' : 'fade',
            'auto' : false
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



        // CHILLY MAP
        // CHILLY MAP



        function drawNewMap( location ) {

            var map_options = {
                zoom: 11,
                mapTypeControl: true,
                scrollwheel: true,
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


        } // end of drawNewMap

        // CHILLY MAP
        // CHILLY MAP






    });

})(jQuery, this);
