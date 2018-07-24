<div class="col-lg-4 col-md-6 mb-3 plate-holder">
	<div class="plates-card-holder">
		<div class="plate-properties">
			<?php $features = (get_the_terms( get_the_id(), 'post_tag' )) ; 
			foreach ($features as $key => $feature) : ?>
				<span data-toggle="tooltip" title="<?php echo $feature->name ?>" class="icon icon-<?php echo $feature->slug ?>"></span> 
			<?php endforeach ?>
		</div>
		<div class="plate-img">
			<div class="plate-link"><a href="<?php the_permalink(); ?>" class="btn-wide">More...</a></div>
			<?php the_post_thumbnail('plate', array('class' => 'img-responsive')); ?>
		</div>
		<div class="plate-description">
			<span class="btn-wide"><?php if ( get_field('plate_price', get_the_id()) === 'On Request' ) {
				echo the_field('plate_price', get_the_id());
			} else {
				echo (get_field('plate_price', get_the_id()) . ' $/box'); 
			};  ?></span>
			<div class="plate-prop">
				<div class="plate-name"><?php the_title( ) ?></div>
				<div class="plate-model">
					<?php $models = (get_the_terms( get_the_id(), 'dimensions' )) ; 
					foreach ($models as $model) :
						the_field('model', get_the_id()) ?>: <?php echo $model->name ?>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>