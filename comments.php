<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Mombo
 * @since 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>
<?php if ( have_comments() ) : ?>
<div class="comments-area m-40px-t m-50px-b">
	<div class="border-bottom-1 border-color-gray p-10px-b m-25px-b">
		<h4 class="m-0px">
			<?php /* translators: %s: search term */ ?>
					<?php echo esc_html( sprintf( _nx( '%s Comment', '%s Comments', get_comments_number(), 'comments title', 'mombo' ), number_format_i18n( get_comments_number() ) ) ); ?>
		</h4>
	</div>
	<ul class="comment-list">
		<?php
			wp_list_comments( array(
				'style'      => 'li',
				'short_ping' => true,
				'callback' => 'mombo_comment_list',
			) );
		?>
	</ul>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'mombo' ); ?></h2>
			<div class="nav-links">
				<?php
					$allowed_html_array = array(
						'span' => array()
					);
				?>
				<div class="nav-previous"><?php previous_comments_link( wp_kses( __( '<span>&laquo;</span> Older Comments', 'mombo' ), $allowed_html_array ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( wp_kses( __( 'Newer Comments <span>&raquo;</span>', 'mombo' ), $allowed_html_array ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
	<?php endif; // check for comment navigation ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mombo' ); ?></p>
	<?php endif; // have_comments() ?>
</div>
						
<?php endif; ?>

<?php comment_form(); ?>