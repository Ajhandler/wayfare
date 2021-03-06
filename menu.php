<?php
/*
Template Name: Menu
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

<!-- set padding with a container -->
<div class="container">
	<!-- keep everything cleared -->
	<div class="row">

		<!-- Set width for list of food -->
		<div class="laptop-six padded panel-large">
			<!-- Food title -->
			<h3 class="text-center">Sandwiches</h3><br>

			<!-- Set up a custom loop, grab post type (always food_item) and taxonomy (i.e. sandwich) -->
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=sandwich ');
			// Set up the post type as a WP post
			foreach($myposts as $post) : setup_postdata($post); ?>
			
			<!-- Markup for how you want it displayed -->
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<!-- close loop -->
			<?php endforeach; ?>
		</div>

		<!-- rinse,wash,repeat -->
		<div class="laptop-six padded panel-large">
			<h3 class="text-center">Bar Fare</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=bar-fare');
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
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=soup');
			foreach($myposts as $post) : setup_postdata($post); ?>
			
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>

		<div class="laptop-four padded panel-large">
			<h3 class="text-center">Salads</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=salad');
			foreach($myposts as $post) : setup_postdata($post); ?>
			
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>

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
	</div>

	<div class="row">

		<div class="laptop-six padded panel-large">
			<h3 class="text-center">Desserts</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=dessert');
			foreach($myposts as $post) : setup_postdata($post); ?>
			
			<p class="food-menu-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_excerpt(); ?> $<?php
			    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
			    if(!empty($meta_value)) {echo $meta_value;}?>
			</p>
			<?php endforeach; ?>
		</div>

		<div class="laptop-six padded panel-large">
			<h3 class="text-center">Kid's Menu</h3><br>
			<?php $myposts = get_posts('posts_per_page=>-1&post_type=food_item&food_type=kids');
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