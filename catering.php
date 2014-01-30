<?php
/*
Template Name: Catering
*/

?>

<?php get_header(); ?>

<!-- Get the normal page content plus maybe a featured img -->
<?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div class="post">
    	<header <?php if (has_post_thumbnail( $post->ID ) ): ?> <?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  $background = $background[0]; ?> style="background-image: url('<?php echo $background; ?>')" <?php post_class('backgrounded entry-header panel-full'); ?> >
			<div class="container-small">
			<?php else :post_class('entry-header panel-large');?> >
			<div class="container text-center">
				<br>
		<?php endif; ?>
		        <h1 class="wayfared" id="post-<?php the_ID(); ?>"><?php the_title();?></h1>
		        <div class="entrytext">
		            <?php the_content('<p class="serif">Read the rest of this page »</p>'); ?>
		        </div>
		        <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
		    </div>
		</header>
    </div>
<?php endwhile; endif; ?>

<!-- Get food custom post type loops -->
<div class="container">

	<div class="row">
		<div class="laptop-six padded panel-large">
			<h3 class="text-center">Assorted Slider Platters</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=catering-platter');
			foreach($myposts as $post) : setup_postdata($post); ?>
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>

		<div class="laptop-six padded panel-large">
			<h3 class="text-center">Sides</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=catering-side');
			foreach($myposts as $post) : setup_postdata($post); ?>
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="row">
		<div class="laptop-four padded panel-large">
			<h3 class="text-center">Soups</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=catering-soup');
			foreach($myposts as $post) : setup_postdata($post); ?>
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>
		<div class="laptop-four padded panel-large">

			

			<h3 class="text-center">Trays</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=catering-tray');

			foreach($myposts as $post) : setup_postdata($post); ?>
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>
		<div class="laptop-four padded panel-large">
			<h3 class="text-center">Sweets</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=catering-sweet');
			foreach($myposts as $post) : setup_postdata($post); ?>
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>
	</div>
</div>
	
<?php get_footer(); ?>
