<?php get_header(); ?>
 


		<main class="single-page">

			<article class="item-page">
				<div class="container">
					<?php while ( have_posts() ) : the_post();  ?>
					<div class="row item-page-wrapper">
						<div class="col-lg-4 d-flex align-items-start flex-column">
							<div class="item-page-img">
								<?php the_post_thumbnail('plate', array('class' => 'img-responsive')); ?>
							</div>
							<div class="plate-properties mb-4">
								<?php $features = (get_the_terms( get_the_id(), 'post_tag' )) ; 
									foreach ($features as $key => $feature) : ?>
									<span data-placement="bottom" data-toggle="tooltip" title="<?php echo $feature->name ?>" class="icon icon-<?php echo $feature->slug ?>"></span> 
								<?php endforeach ?>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="row">
								<div class="col-md-8">
									<h1><?php the_title( ) ?></h1>
									<h3><?php the_field('subhead') ?></h3>
									<?php $models = (get_the_terms( get_the_id(), 'dimensions' )) ; 
									foreach ($models as $model) : ?>
									<p><?php the_field('model') ?>: <?php echo $model->name ?></p>
									<?php endforeach ?>
								</div>
								<div class="col-md-4">
									<div class="item-page-price"><?php if ( get_field('plate_price', get_the_id()) === 'On Request' ) {
										echo the_field('plate_price', get_the_id());
									} else {
										echo (get_field('plate_price', get_the_id()) . ' $/box'); 
									};  ?>
									</div>
								</div>
								<div class="col-12">
									<?php the_content( ); ?>
								</div>
							</div>
						</div>
						<div class="col-12 item-page-fca">
							<p><?php the_field('product_note', 31) ?></p>
						</div>
						<div class="col-12 item-page-buttons-section">
							<button id='get-plate' class="btn-wide green">Contact our manager</button>
						</div>
					</div>
					<?php endwhile;?>
				</div>				
			</article>

<!-- booking modal -->
<?php echo get_field('product_booking', 31, false); ?>
<?php echo get_field('done_window', 31, false); ?>


		</main>

<?php get_footer(); ?>
