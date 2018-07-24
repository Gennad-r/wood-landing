<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Template Basic Images Start -->
	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#000">
	<?php wp_head(); ?>
</head>
<body>
	<div class="top-button">
		<span class="icon icon-arrow-up"></span>
	</div>
	<div class="container-wood">
		<header>
			<div class="container mb-4">
				<div class="row mt-3">
					<div class="logo-holder col-auto">
						<a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri() . '/app/img/logo-wood.svg' ?>" alt="logo" class="img-responsive"></a>
					</div>
					<div class="ml-auto col-auto d-lg-none d-block mt-3">
						<button class="hamburger hamburger--spring" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
				<div class="row top-menu align-items-center mt-3 d-none d-lg-flex">
				<?php
					$defaults = array(
						'theme_location' => 'main-menu-reg',
						'menu' => 'Primary menu reg',
						'container' => 'nav',
						'container_class' => 'menu col-lg-auto',
						'menu_class' => 'navigation d-flex',
					);
				
					wp_nav_menu( $defaults );
				?>
					<nav class="social ml-auto col-lg-auto">
						<ul class="d-flex">
							<li><a href="<?php the_field('whatsap', 31); ?>"><span class="icon icon-whatsap"></span></a></li>
							<li><a href="<?php the_field('skype', 31); ?>"><span class="icon icon-skype"></span></a></li>
							<li><a href="<?php the_field('viber', 31); ?>"><span class="icon icon-viber"></span></a></li>
						</ul>
					</nav>
				</div>
			</div>



		</header>



		
