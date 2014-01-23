<?php
/**
 * The front page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wayfare
 */



get_header(); ?>
	<div class="panel-full backgrounded" id="blog-page">
		<div class="container">
			<h1 class="wayfared">The Wayfare Blog</h1>
		</div>
	</div>
	<div id="primary" class="content-area panel-large">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="row panel-large">
						<?php if (has_post_thumbnail()) : ?>
							<div class="tablet-three circle-photo">
								<?php the_post_thumbnail('thumb'); ?>
							</div>
							<div class="tablet-nine">
						<?php else : ?>
							<div class="twelve">
						<?php endif; ?>						
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_content(); ?></p>
						</div>
						</div>
					<?php endwhile; ?>

				<?php endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>