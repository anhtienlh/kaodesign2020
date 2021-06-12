<?php if ( post_password_required() ) { ?>
		<p class="eltdf-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'ambient' ); ?></p>
<?php } else { ?>
	<?php if ( have_comments() ) { ?>
		<div class="eltdf-comment-holder clearfix" id="comments">
			<div class="eltdf-comment-holder-inner">
				<div class="eltdf-comments-title">
					<h4><?php esc_html_e('COMMENTS', 'ambient' ); ?></h4>
				</div>
				<div class="eltdf-comments">
					<ul class="eltdf-comment-list">
						<?php wp_list_comments(array( 'callback' => 'ambient_elated_comment')); ?>
					</ul>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<?php if ( ! comments_open() ) : ?>
			<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'ambient'); ?></p>
		<?php endif; ?>	
	<?php } ?>
<?php } ?>
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$eltd_consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> esc_html__( 'POST A COMMENT','ambient' ),
	'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
	'title_reply_after' => '</h4>',
	'title_reply_to' => esc_html__( 'Post a Reply to %s','ambient' ),
	'cancel_reply_link' => esc_html__( 'cancel reply','ambient' ),
	'label_submit' => esc_html__( 'SUBMIT','ambient' ),
	'comment_field' => '<textarea id="comment" placeholder="'.esc_attr__( 'Your comment','ambient' ).'" name="comment" cols="45" rows="6" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<input id="author" name="author" placeholder="'. esc_attr__( 'Your Name','ambient' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />',
		'email' => '<input id="email" name="email" placeholder="'. esc_attr__( 'Your Email','ambient' ) .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' />',
		'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $eltd_consent . ' />' .
			'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'ambient' ) . '</label></p>',
		 ) ) );
 ?>
<?php if(get_comment_pages_count() > 1){ ?>
	<div class="eltdf-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
<?php if(comments_open()) { ?>
	<div class="eltdf-comment-form">
		<div class="eltdf-comment-form-inner">
			<?php comment_form($args); ?>
		</div>
	</div>
<?php } ?>	