<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
    <div class="wrap">

		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="col-lg-12">
					<h1><?php echo get_field('title'); ?></h1>
				</div>
				<div class="col-sm-6">	           	
					<?php echo get_field('text_1'); ?>
				</div>
				<div class="col-sm-6">	           	
					<?php echo get_field('text_2'); ?>
				</div>
			<?php endwhile; // end of the loop. ?>
        </div>
    </div>

<div class="wrap" id="app-container">

<?php get_footer();
