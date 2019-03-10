(function ($, root, undefined) {

	$(function () {

		'use strict';

		var $window = $(window);



		function is_nav_visible(){
			if ($window.width()>1199) {$('header nav').removeClass('visible');}
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

		// var $pathname = window.location.pathname;
		// if($pathname == '/galerie/'){
		// 	$('a.gallery').first().click();
		// }



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


		$('.villa_tr.unavailable').each(function(){
			var $layer = $(this).data('layer');
			$($layer).addClass( "greyhouse"  );
		})

		$('.villa_tr.booked').each(function(){
			var $layer = $(this).data('layer');
			$($layer).addClass( "lightbrownhouse"  );
		})

		var $svg = $("#villas-individuelles");

		$('tr.villa_tr, .villa_group').on('touchstart', function(){

			var $layer = $(this).data('layer');
			$('g').removeClass('visible');
			$($layer, $svg).addClass( "visible"  );
		})

		$('tr.villa_tr, .villa_group').on('mouseover', function(){

			var $layer = $(this).data('layer');

			// $($layer, $svg).attr('class', "visible"  );
			$($layer, $svg).addClass( "visible"  );
		}).on('mouseout', function(){

			var $layer = $(this).data('layer');
			// $($layer, $svg).attr('class', ""  );
			$($layer, $svg).removeClass("visible");

		})

		$('g').on('mouseover', function(){

			// $(this).attr('class', "visible"  );
			$(this).addClass( "visible"  );
		}).on('mouseout', function(){

			// $(this).attr('class', ""  );
			$(this).removeClass("visible");

		})

		$('.villa_group1').on('click', function(){
			if ($('.villa_group1').hasClass('rotate_arrow')) {$('.villa_table1').slideUp(); $('.villa_group1').removeClass('rotate_arrow'); }
			else {
				$('.rotate_arrow').removeClass('rotate_arrow');
				$('.villa_table').slideUp();
				$('.villa_table1').slideDown();
				$('.villa_group1').addClass('rotate_arrow');
			}

		})
		$('.villa_group2').on('click', function(){
			if ($('.villa_group2').hasClass('rotate_arrow')) {$('.villa_table2').slideUp(); $('.villa_group2').removeClass('rotate_arrow'); }
			else {
				$('.rotate_arrow').removeClass('rotate_arrow');
				$('.villa_table').slideUp();
				$('.villa_table2').slideDown();
				$('.villa_group2').addClass('rotate_arrow');
			}

		})
		$('.villa_group3').on('click', function(){
			if ($('.villa_group3').hasClass('rotate_arrow')) {$('.villa_table3').slideUp(); $('.villa_group3').removeClass('rotate_arrow'); }
			else {
				$('.rotate_arrow').removeClass('rotate_arrow');
				$('.villa_table').slideUp();
				$('.villa_table3').slideDown();
				$('.villa_group3').addClass('rotate_arrow');
			}

		})
		$('.villa_group4').on('click', function(){
			if ($('.villa_group4').hasClass('rotate_arrow')) {$('.villa_table4').slideUp(); $('.villa_group4').removeClass('rotate_arrow'); }
			else {
				$('.rotate_arrow').removeClass('rotate_arrow');
				$('.villa_table').slideUp();
				$('.villa_table4').slideDown();
				$('.villa_group4').addClass('rotate_arrow');
			}

		})






		// $('.villa_group2').on('click', function(){$('.villa_table2').slideToggle(); $('.villa_group2').toggleClass('rotate_arrow');})
		// $('.villa_group3').on('click', function(){$('.villa_table3').slideToggle(); $('.villa_group3').toggleClass('rotate_arrow');})
		// $('.villa_group4').on('click', function(){$('.villa_table4').slideToggle(); $('.villa_group4').toggleClass('rotate_arrow');})

		$('form#documents_form').on('submit', function(e){
			e.preventDefault();
			$.ajax({
				url: "../wp-content/themes/grumes/sections/mail.php",
				data: $(this).serializeArray(),
				method: 'POST'
			}).done(function(data) {
				$('#form_message').html(data);
				$('#form_message').show();

			});

		})



	});

})(jQuery, this);
