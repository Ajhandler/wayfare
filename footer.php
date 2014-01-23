<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wayfare
 */
?>

	</div><!-- #content -->

	<footer class="site-footer" role="contentinfo">
		<div class="panel-medium">
			<div class="container">
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
			</div>
		</div>
		<div class="site-info text-center row">
			<p>&copy;<?php 
			if((date('Y'))==="2013"){
				echo date('Y');
			}else{
				echo "2013 - ".date('Y');
			}?> Wayfare. All rights Reserved.</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src=\"js/jquery-1.10.2.min.js\"><\/script>")</script>
<script src="<?php get_template_directory(); ?>/js/jquery.fitvid.js"></script>

<script src="<?php get_stylesheet_directory() ?>/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>