<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <?php $tdu = get_template_directory_uri(); ?>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo $tdu; ?>/img/favicon.ico" rel="shortcut icon">
	<link href="<?php echo $tdu; ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,700,700i" rel="stylesheet">
	<?php wp_head(); ?>


</head>
<body <?php body_class(); ?>>

<?php// do_action('wpml_add_language_selector'); ?>
	<!-- HEADER -->
	<header id="header">
		<div class="container">
			<a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a>
			<nav>
				<ul>
					<?php chilly_nav('header_menu'); ?>
				</ul>
			</nav>
			<div class="clear"></div>
			<a href="#" id="show_mobile_nav" >Menu</a>
		</div>

	</header>
