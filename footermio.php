<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage mitema
 * @since 1.0.0
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<!-- <div class="container-footer"> -->
	<?php get_template_part('template-parts/footer/footer', 'widgets'); ?>
	<!-- </div> -->
	<div class="site-info">
		<!-- <div class="pie"> -->
		<?php $blog_info = get_bloginfo('name'); ?>
		<?php if (!empty($blog_info)) : ?>
			<a class="site-name" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?> - </a>
		<?php endif; ?>
		<!-- </div>
		<div class="lema"> -->
		<a href="<?php echo esc_url(__('https://pacosilva.com/', 'mitema')); ?>" class="imprint">
			<strong style="color: #820000">
				<?php
				/* translators: %s: WordPress. */
				printf(__('Hecho con mucho esfuerzo por %s.', 'mitema'), 'Paco Silva');
				?>
			</strong>
		</a>
		<!-- </div> -->
		<?php
		if (function_exists('the_privacy_policy_link')) {
			the_privacy_policy_link('', '<span role="separator" aria-hidden="true"></span>');
		}
		?>
		<?php if (has_nav_menu('footer')) : ?>
			<!-- <div class="nav menu-pie"> -->
			<nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', 'mitema'); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
					)
				);
				?>
			</nav><!-- .footer-navigation -->
			<!-- </div> -->
		<?php endif; ?>
	</div>
	</div><!-- .site-info -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>