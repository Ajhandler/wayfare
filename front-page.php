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
<!-- Get the normal page content plus maybe a featured img -->
<?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div class="panel-full backgrounded">
    	<header <?php if (has_post_thumbnail( $post->ID ) ): ?> <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  $background = $background[0]; ?> style="background-image: url('<?php echo $background; ?>')" <?php post_class('backgrounded entry-header panel-full'); ?> >
			<div class="container-small">
			<?php else :post_class('entry-header panel-large');?> >
			<div class="container text-center">
				<br>
		<?php endif; ?>
		        <h1 class="wayfared" id="post-<?php the_ID(); ?>"><?php bloginfo('name'); ?></h1>
		        <div class="entrytext">
		            <?php bloginfo('description'); ?>
		        </div>
		        <?php edit_post_link('Edit the background.', '<p>', '</p>'); ?>
		    </div>
		</header>
    </div>
<?php endwhile; endif; ?><div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="panel-medium">
			<?php dynamic_sidebar( 'homepage-widgets' ); ?> 
		</div>
		<div class="banner panel-medium">
			<h2 class="wayfared">Menu</h2>
		</div>

		<div class="laptop-six padded panel-large">
			<h3 class="text-center">Sandwiches</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=sandwich');
			foreach($myposts as $post) : setup_postdata($post); ?>
			
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>

		<div class="laptop-six padded panel-large">
			<h3 class="text-center">Salads</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=salad');
			foreach($myposts as $post) : setup_postdata($post); ?>
			
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>

		<div class="row">
			<div class="laptop-four padded panel-large">
				<h3 class="text-center">Sides</h3><br>
				<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=side');
				foreach($myposts as $post) : setup_postdata($post); ?>
				
				<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
				    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
				    if(!empty($meta_value)) {echo $meta_value;}?>
				</p>
				<?php endforeach; ?>
			</div>

			<div class="laptop-four padded panel-large">
				<h3 class="text-center">Desserts</h3><br>
				<?php $myposts = get_posts('posts_per_page=>-1&=food_item&food_type=dessert');
				foreach($myposts as $post) : setup_postdata($post); ?>
				
				<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
				    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
				    if(!empty($meta_value)) {echo $meta_value;}?>
				</p>
				<?php endforeach; ?>
			</div>

			<div class="laptop-four padded panel-large">
				<h3 class="text-center">Cocktails</h3><br>
				<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=cocktail');
				foreach($myposts as $post) : setup_postdata($post); ?>
				
				<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
				    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
				    if(!empty($meta_value)) {echo $meta_value;}?>
				</p>
				<?php endforeach; ?>
			</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>