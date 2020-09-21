<?php
/**
 * Modify comment template
 *
 * @package Mombo
 * @since 1.0
 */

function mombo_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'mombo_move_comment_field_to_bottom' );

function mombo_comment_form($args) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );

	$args['fields'] = array(
      'author' =>
        '<div class="col-md-6 form-group"><label class="form-control-label">'. esc_html__( 'Your Name', 'mombo' ) . ( $req ? '*' : '' ) .'</label><input id="name" class="form-control" name="author" required="required" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
        '" size="30"' . ( $req ? " aria-required='true'" : '' ) . ' /></div>',

      'email' =>
        '<div class="col-md-6 form-group"><label class="form-control-label">'. esc_html__( 'Your Email', 'mombo' ) . ( $req ? '*' : '' ) .'</label><input id="email" class="form-control" name="email" required="required" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
        '" size="30"' . ( $req ? " aria-required='true'" : '' ) . ' /></div>',

      'url' =>
        '<div class="col-md-12 form-group"><label class="form-control-label">'. esc_html__( 'Got a Website?', 'mombo' ) .'</label><input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
        '" size="30"/></div>'
      );
	$args['id_form'] = "comment_form";
	$args['class_form'] = "row";
	$args['id_submit'] = "submit";
	$args['class_submit'] = "m-btn m-btn-radius m-btn-theme";
	$args['class_container'] = "comment-respond card gray-bg card-body";
	$args['submit_field'] = '<div class="col-md-12"><p class="form-submit">%1$s %2$s</p></div>';
	$args['logged_in_as'] = sprintf(
		'<div class="col-md-12"><p class="logged-in-as">%s</p></div>',
		sprintf(
			/* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
			wp_kses( __( 'Logged in as <a href="%1$s" aria-label="%2$s">%3$s</a>. <a class="log-out-link" href="%4$s">Log out?</a>', 'mombo' ), Mombo_Static::html_allow() ),
			get_edit_user_link(),
			/* translators: %s: User name. */
			esc_attr( sprintf( wp_kses( __( 'Logged in as %s. Edit your profile.', 'mombo' ), Mombo_Static::html_allow() ), get_the_author_meta('display_name') ) ),
			get_the_author_meta('display_name'),
			/** This filter is documented in wp-includes/link-template.php */
			wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ), get_the_ID() ) )
		)
	);
	$args['name_submit'] = "submit";
	$args['title_reply'] = wp_kses( __( '<span>Leave a Reply</span>', 'mombo' ), Mombo_Static::html_allow() );

	/* translators: %s: Extra words for comment title */
	$args['title_reply_to'] = wp_kses( __( 'Leave a Reply to %s', 'mombo' ), Mombo_Static::html_allow() );
	$args['cancel_reply_link'] = esc_html__( 'Cancel Reply', 'mombo' );
	$args['comment_notes_before'] = "";
	$args['comment_notes_after'] = "";
	$args['label_submit'] = esc_html__( 'Post Comment', 'mombo' );
	$args['comment_field'] = '<div class="col-md-12 form-group"><label class="form-control-label">'. esc_html__( 'Your Comments', 'mombo' ) .'</label><textarea id="message" class="form-control" name="comment" aria-required="true" rows="6" cols="45"></textarea></div>';
	return $args;
}

add_filter('comment_form_defaults', 'mombo_comment_form');

function mombo_comment_list($comment, $args, $depth) { 
	extract($args, EXTR_SKIP);
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>

<<?php echo wp_kses_post( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?> 
	
	<div class="comment-meta d-flex align-items-center">
		<div class="comment-author">
			<?php echo get_avatar($comment, $size='50'); ?>	
		</div>
		<div class="comment-metadata">
			<div class="c-name"><?php printf( esc_html__( ' %1$s ', 'mombo' ), get_comment_author_link() ); ?></div>
			<span class="c-date">
				<?php
					/* translators: Comments date, edit link. */
					printf( esc_html__('%1$s at %2$s','mombo'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)','mombo' ), '  ', '' );
				?> 
			</span>
		</div>
	</div>
	<div class="comment-content">
		<?php comment_text(); ?>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<p><em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','mombo' ); ?></em></p>
		<?php endif; ?>
	</div>
	
	<div class="comment-reply"> 
		<?php 
			$new_class = 'm-btn m-btn-t-theme m-btn-radius m-btn-sm';
			echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $new_class, 
				get_comment_reply_link(array_merge( $args, array(
					'add_below' => $add_below, 
					'depth' => $depth, 
					'max_depth' => $args['max_depth']))), 1 ); 
		?>
	</div> 
					
	<?php if ( 'div' != $args['style'] ) : ?>
	</div><!-- /.comment-body -->
	<?php endif; 
}