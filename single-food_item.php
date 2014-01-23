<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Wayfare
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header <?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
					$background = $background[0]; ?>
					style="background-image: url('<?php echo $background; ?>')"
					<?php post_class('backgrounded entry-header panel-full');
				else :
					post_class('entry-header panel-large banner');
				endif; ?> >
					<div class="container-small">
						<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry-meta">
							<p><?php the_excerpt(); ?></p>
							<p>$<?php
							    // Retrieves the stored value from the database
							    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
							    // Checks and displays the retrieved value
							    if( !empty( $meta_value ) ) {
							        echo $meta_value;
							    }
							?></p>
						</div>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->
				<div class="panel-large">
					<div class="container-small">
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'wf' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php
							/* translators: used between list items, there is a space after the comma */
							$category_list = get_the_category_list( __( ', ', 'wf' ) );

							/* translators: used between list items, there is a space after the comma */
							$tag_list = get_the_tag_list( '', __( ', ', 'wf' ) );

							if ( ! wf_categorized_blog() ) {
								// This blog only has 1 category so we just need to worry about tags in the meta text
								if ( '' != $tag_list ) {
									$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wf' );
								} else {
									$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wf' );
								}

							} else {
								// But this blog has loads of categories so we should probably display them here
								if ( '' != $tag_list ) {
									$meta_text = __( 'Bookmark this <a href="%3$s" rel="bookmark">menu item</a>.', 'wf' );
								} else {
									$meta_text = __( 'Bookmark this <a href="%3$s" rel="bookmark">menu item</a>.', 'wf' );
								}

							} // end check for categories on this blog

							printf(
								$meta_text,
								$category_list,
								$tag_list,
								get_permalink()
							);
						?>

						<?php edit_post_link( __( 'Edit this page', 'wf' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
					<br>
					</div><!-- end .container -->
				</div>
			</article><!-- #post-## -->

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>