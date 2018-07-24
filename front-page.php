<?php get_header('home'); ?>
		<main>
			<?php if (have_posts()) : the_post(); ?>
			<article class="welcome-section" id="welcome-section">
				<div class="bg-holder" style="background-image: url(<?php the_post_thumbnail_url('front_bg' ) ?>)">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php echo get_the_title(); ?></h1>
									</div>
									<div class="col-12 article-content">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
							<div class="d-sm-none mt-lg-0 mt-3 mb-lg-0 mb-3 col-lg-6 d-none d-md-flex align-items-center justify-content-center">
								<div class="img-holder"><img src="<?php echo get_template_directory_uri() . '/app/img/sections-text/welcome.svg' ?>" alt="welcome" class="img-responsive"></div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<?php endif; ?>

			<?php if ($slider->have_posts()) : ?>
			<article class="gallery-section" id="gallery-section">
				<div class="bg-holder">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php the_field('gallery'); ?></h1>
									</div>
									<div class="col-12 article-content">
										<div class="owl-carousel main-gallery">
											<?php while ($slider->have_posts()) : $slider->the_post(); ?>
											<div class="slide-item">
												<?php the_post_thumbnail('slider', array('class' => 'img-responsive' )); ?>
											</div>
											<?php endwhile;
											wp_reset_postdata();
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<?php endif; ?>
			<article class="collections-section" id="collections-section">
				<div class="bg-holder" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php the_field('collection_background_image'); ?>);">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php the_field('collections_section_name'); ?></h1>
									</div>
								</div>
							</div>
							<div class="col-lg-12 collection">
								<div class="row">
									<div class="col-lg-6 pt-3 pb-3 d-flex ">
										<div class="collection-card">
											<h3><?php echo get_term(1)->name ?></h3>
											<p class="mt-2 mb-4 align-self-center"><?php echo get_term(1)->description ?></p>
											<a href="<?php echo get_term_link(1) ?>" class="btn-wide brown mt-auto"><?php the_field('bottons_text'); ?></a>
										</div>
									</div> <!-- collection block -->
									
									<div class="col-lg-6 pt-3 pb-3 d-flex">
										<div class="collection-card">
											<h3><?php echo get_term(5)->name ?></h3>
											<p class="mt-2 mb-4 align-self-center"><?php echo get_term(5)->description ?></p>
											<a href="<?php echo get_term_link(5) ?>" class="btn-wide brown mt-auto"><?php the_field('bottons_text'); ?></a>
										</div>
									</div> <!-- collection block -->
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="about-product" id="about-product">
				<div class="bg-holder" style="background-image: url(<?php the_field('about_the_product_background'); ?>);">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php the_field('about_the_product_header'); ?></h1>
									</div>
									<div class="col-12 article-content">
										<?php echo get_field('about_the_product_content', false, false); ?>
									</div>
								</div>
							</div>
							<div class="d-sm-none mt-lg-0 mt-3 mb-lg-0 mb-3 col-lg-6 d-none d-md-flex align-items-center justify-content-center">
								<div class="img-holder"><img src="<?php echo get_template_directory_uri() . '/app/img/sections-text/about-product.svg' ?>" alt="about product" class="img-responsive"></div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="about-company" id="about-company">
				<div class="bg-holder" style="background-image: url(<?php the_field('about_the_company_img'); ?>);">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php the_field('about_the_company_header') ?></h1>
									</div>
									<div class="col-12 article-content">
										<div class="logo-holder mt-4 mb-3"><img src="<?php echo get_template_directory_uri() . '/app/img/logo-wood.svg' ?>" alt="our company logo" class="img-responsive"></div>
										<?php the_field('about_the_company_content') ?>
									</div>
								</div>
							</div>
							<div class="d-sm-none mt-lg-0 mt-3 mb-lg-0 mb-3 col-lg-6 d-none d-md-flex align-items-center justify-content-center">
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="worldwide" id="worldwide">
				<div class="bg-holder">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php the_field('worldwide_header') ?></h1>
									</div>
								</div>
							</div>
							<div class="map-holder col-12 pt-3">
								<img src="<?php the_field('worldwide_map') ?>" alt="map" class="img-responsive">
							</div>
							<div class="col-md-6">
								<?php the_field('worldwide_content') ?>
							</div>
							<div class="col-md-3 offset-lg-3 countries">
								<?php echo get_field('worldwide_legend', false, false) ?>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="special-offer" id="special-offer">
				<div class="bg-holder" style="background-image: url(<?php the_field('special_offer_image'); ?>);">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php the_field('special_offer_head') ?></h1>
									</div>
									<div class="col-12 article-content ">
										<?php the_field('special_offer_content') ?>
										<p><button id="special-offer-btn" class="btn-wide green">Contact Us</button></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
			<article class="contacts" id="contacts">
				<div class="bg-holder" style="background-image: url(<?php the_field('contacts_section_image'); ?>);">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php the_field('contacts_head') ?></h1>
									</div>
									<div class="col-12 article-content pt-2">
										<?php echo get_field('get_in_touch', false, false); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</article>
		</main>


<!-- modal -->
<?php echo get_field('special_offer', false, false); ?>
<?php echo get_field('done_window', false, false); ?>


		
<?php get_footer('home'); ?>
