		<footer class="mt-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-sm-8 mb-2 mb-md-0">
						<div class="mb-md-5 mb-3">
							<a href="#"><img src="<?php echo get_template_directory_uri() . '/app/img/logo-wood.svg' ?>" alt="logo" class="img-responsive"></a>
						</div>
						<div class="bottom-contacts">
							<p><a href="tel:<?php the_field('phone_number', 31) ?>"><span class="icon icon-call"></span> <?php the_field('phone_number', 31) ?></a></p>
							<p><a href="mailto:<?php the_field('email', 31) ?>"><span class="icon icon-email"></span> <?php the_field('email', 31) ?></a></p>
						</div>
					</div>
					<?php
						$defaults = array(
							'theme_location' => 'main-menu',
							'menu' => 'Primary menu',
							'container' => 'div',
							'container_class' => 'col-lg-3 col-sm-4',
							'menu_class' => 'navigation',
						);
					
						wp_nav_menu( $defaults );
					?>
					
					<div class="social-bottom col-lg-4 text-lg-right text-left mt-3 mt-md-0">
						<ul>
							<li class="d-inline-block">
								<a target="_blank" href="<?php the_field('facebook', 31); ?>"><span class="icon icon-facebook"></span></a>
							</li>
							<li class="d-inline-block">
								<a target="_blank" href="<?php the_field('instagram', 31); ?>"><span class="icon icon-instagram"></span></a>
							</li>
							<li class="d-inline-block">
								<a target="_blank" href="<?php the_field('pinterest', 31); ?>"><span class="icon icon-pinterest"></span></a>
							</li>
							<li class="d-inline-block">
								<a href="<?php the_field('skype', 31); ?>"><span class="icon icon-skype"></span></a>
							</li>
							<li class="d-inline-block">
								<a href="<?php the_field('whatsap', 31); ?>"><span class="icon icon-whatsap"></span></a>
							</li>
							<li class="d-inline-block">
								<a href="<?php the_field('viber', 31); ?>"><span class="icon icon-viber"></span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	

	</div> <!-- container-wood -->
	<?php wp_footer(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122644963-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-122644963-1');
	</script>
</body>
</html>