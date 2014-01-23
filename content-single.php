<?php
/**
 * @package Wayfare
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header <?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
		$background = $background[0]; ?>
		style="background-image: url('<?php echo $background; ?>')"
		<?php post_class('backgrounded entry-header panel-full'); 
		else :
			post_class('entry-header panel-full'); 
		endif; ?> >
		<div class="container-small">
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">
				<?php wf_posted_on(); ?>
			</div>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="panel-large">
		<div class="container">
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
							$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wf' );
						} else {
							$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wf' );
						}

					} // end check for categories on this blog

					printf(
						$meta_text,
						$category_list,
						$tag_list,
						get_permalink()
					);
				?>

				<?php edit_post_link( __( 'Edit', 'wf' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</div>
	</div>
</article><!-- #post-## -->