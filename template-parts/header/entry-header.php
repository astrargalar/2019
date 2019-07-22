<?php

/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage mitema
 * @since 1.0.0
 */

$discussion = !is_page() && mitema_can_show_post_thumbnail() ? mitema_get_discussion_data() : null; ?>

<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

<?php if (!is_page()) : ?>
	<div class="entry-meta">
		<?php mitema_posted_by(); ?>
		<?php mitema_posted_on(); ?>
		<span class="comment-count">
			<?php
			if (!empty($discussion)) {
				mitema_discussion_avatars_list($discussion->authors);
			}
			?>
			<?php mitema_comment_count(); ?>
		</span>
		<?php
		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__('Edit <span class="screen-reader-text">%s</span>', 'mitema'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . mitema_get_icon_svg('edit', 16),
			'</span>'
		);
		?>
	</div><!-- .meta-info -->
<?php endif; ?>