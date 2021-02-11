<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<!-- loading fonts -->
        <style>
		@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif:ital@0;1&display=swap');
		</style><!-- going to phase this out for the new fonts below -->
		<script src="https://kit.fontawesome.com/01c8e3d542.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://use.typekit.net/ioy1hib.css">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>
	</head>
	<body <?php body_class(); ?>>
		<!-- header -->
		<header class="wt_header clear" role="banner">

				<!-- logo -->
				<div class="wt_header__logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg" alt="Logo" class="logo-img">
					</a>
				</div>
				<!-- /logo -->

				<!-- nav -->
				<nav class="wt_header__nav" role="navigation">
				<?php 
					main_nav();
					calls_to_action(); ?>
					<!--
					<div class="wt_nav--searchbar">
					Search form
						<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get" class="wt_archive-languages__searchform">
							<input id="languages_search" maxlength="150" name="languages_search" size="20" type="text" value="" class="txt" placeholder="Search languages" />
							<input name="post_type" type="hidden" value="languages" />
							<input id="searchsubmit" class="btn" type="submit" value="Search" />
						</form>
					</div> -->
				</nav>
				<!-- /nav -->

		</header>
		<!-- /header -->
