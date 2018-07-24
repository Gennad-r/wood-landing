<?php get_header(); ?>
<?php $cat_id = get_query_var('cat');  ?>
<?php 
$args = array(
	'taxonomy'      => 'category',
	'orderby'       => 'count', 
	'order'         => 'DESC',
	'hide_empty'    => true, 
	'number'        => '', 
	'fields'        => 'all', 
	'count'         => false,
	'parent'        => '',
	'hierarchical'  => true, 
	'child_of'      => 5, 
	'get'           => '', // ставим all чтобы получить все термины
	'name__like'    => '',
	'pad_counts'    => false, 
	'offset'        => '', 
	'search'        => '', 
	'cache_domain'  => 'core',
	'name'          => '', // str/arr поле name для получения термина по нему. C 4.2.
	'childless'     => false, // true не получит (пропустит) термины у которых есть дочерние термины. C 4.2.
	'update_term_meta_cache' => true, // подгружать метаданные в кэш
	'meta_query'    => '',
); 


$textures = get_terms( $args ); ?>

<main>

			<article class="elegant-collection-main">
				<div class="bg-holder" style="background-image: url(<?php the_field('collections_image_for_background_arch', get_queried_object()); ?>);">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="row">
									<div class="col-12 header-container">
										<h1 class="mt-2 mb-0"><?php echo single_cat_title(); ?></h1>
									</div>
									<div class="col-12 article-content">
										<?php echo category_description(); ?>
									</div>
								</div>
							</div>
							<div class="d-sm-none mt-lg-0 mt-3 mb-lg-0 mb-3 col-lg-6 d-none d-md-flex align-items-center justify-content-center">
								<div class="img-holder"><img src="img/sections-text/welcome.svg" alt="" class="img-responsive"></div>
							</div>
						</div>
					</div>
				</div>
			</article>

			<?php if ($textures) : ?>
			<div class="wood-types">
				<div class="container">
					<div class="row">
						<div class="col-12 mb-4">
							<h2>Type of Wood</h2>
						</div>
						<?php foreach ($textures as $texture) : ?>
							<?php //print_r($texture); ?>
						<div class="material-plate col-lg-2 col-md-4 col-6"><a href="<?php echo(get_home_url() . '/' . $texture->taxonomy . '/' . $texture->slug) ?>"><span class="wood-type-plates" style="background-image: url(<?php echo the_field('collections_image_for_background_arch', $texture->taxonomy . '_' . $texture->term_id) ?>);"><i><?php echo $texture->name ?></i></span></a></div>
						
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<?php endif ?>



			<div class="plates-section">
				<div class="container">
					<div class="row">
						<div class="col-12 mb-3">
							<h2><?php echo single_cat_title(); ?></h2>
						</div>
					</div>
					<div class="row">

						<?php while ( have_posts() ) : the_post(); 

							get_template_part('parts/items');

						endwhile;?>

					</div>

					<?php if (  $wp_query->max_num_pages > 1 ) : ?>
					<div class="row">
						<div class="col text-center">
							<button id="load-more" class="btn-wide" style="display: inline-block;"><span>Load more...</span></button>
						</div>
					</div>
					<?php endif; ?>

					
					<div class="row">
						<div class="col-12 mt-5">
							<p><strong><?php the_field('product_note', 31) ?></strong></p>
						</div>
					</div>
					<div class="row">
						<div class="col-12"><a target="_blank" href="http://en.woodmosaica.com/catalog/collecton_3D.pdf" class="btn-wide download green">Download the Catalogue</a></div>
					</div>

				</div>
			</div>

			<?php $features_list = get_terms(array(
				'taxonomy' => 'post_tag',
				'hide_empty' => false,
			)); 
			if($features_list) : ?>
			<div class="patterns">
				<div class="container">
					<div class="row">
						<div class="col-12 mb-4">
							<h2><?php echo get_taxonomy_labels(get_taxonomy('post_tag'))->singular_name  ?></h2>
						</div>
						<?php foreach ($features_list as $el) : ?>
						<div class="col-md-6 pattern">
							<span class="icon icon-<?php echo $el->slug ?>"></span>
							<div class="pattern-description">
								<h5><?php echo $el->name ?></h5>
								<p><?php echo $el->description ?></p>
							</div>
						</div><!-- product-pattern-item -->
						<?php endforeach ?>
					</div>
				</div>			
			</div> <!-- patterns -->
			<?php endif ?>

			<?php 
			// existing tiles dimensions 
			$dims = get_posts(array(
				'post_type' => 'post',
				'numberposts' => -1,
				'category' => $cat_id
			));
			$dim_list = array();
			foreach ($dims as $dim) {
				$term_item = (get_the_terms( $dim->ID, 'dimensions' ));
				$dim_list[] = $term_item;

			}
			wp_reset_postdata();
			$dim_list = array_map("unserialize", array_unique(array_map("serialize", $dim_list)));
			 ?>
			<div class="dimensions">
				<div class="container">
					<div class="row">
						<div class="col-12 mb-4"><h2><?php echo get_taxonomy_labels(get_taxonomy('dimensions'))->singular_name ?></h2></div>
						<?php foreach ($dim_list as $el) : ?>
						<div class="col-lg-4 col-sm-6">
							<div class="dim-img-holder">
								<img src="<?php the_field('dimensions_image', $el[0]->taxonomy . '_' . $el[0]->term_id) ?>" alt="" class="img-responsive">
								<div class="dim-size"><?php echo $el[0]->name ?></div>
							</div>
							<p><?php echo $el[0]->description ?></p>
						</div> <!-- plate -->
						<?php endforeach ?>
					</div>
				</div>
			</div>
</main>
<?php get_footer(); ?>