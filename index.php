<?php get_header(); ?>
 <h1>INDEX PAGE</h1>
<?php //print_r(get_field_object('bottons_text')); ?>	
<?php echo home_url( $path = '', $scheme = null ) ?>	
<?php the_field('gallery'); ?>	
<?php get_footer(); ?>
