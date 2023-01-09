<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="border-t border-gray-300 pt-4 comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="font-bold text-xl text-gray-900 comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: Post title. */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'tailkick' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: Number of comments, 2: Post title. */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'tailkick'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="mb-6 comment-list">
			<?php
				wp_list_comments(
					array(
            'walker'      => new Tailkick_Walker_Comment(),
						'avatar_size' => 60,
						'style'       => 'div',
						'short_ping'  => true,
            'reply_text'  => '<div class="flex items-center">' . tailkick_get_svg( array( 'icon' => 'mail-reply' ) ) . '<span class="ml-2">' . esc_html__( 'Reply', 'tailkick' ) . '</span></div>',
            'format'      => 'html5',
            'echo'        => true,
					)
				);
			?>
		</ol>

		<?php

      the_comments_pagination(
        array(
          'prev_text' => tailkick_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text">' . __( 'Previous', 'tailkick' ) . '</span>',
          'next_text' => '<span class="sr-only focus:not-sr-only focus:bg-gray-50 focus:rounded focus:shadow focus:text-sky-800 focus:text-sm focus:font-bold focus:left-1.5 focus:leading:normal focus:py-3.5 focus:pr-6 focus:no-underline focus:top-1.5 focus:z-[100000] screen-reader-text">' . __( 'Next', 'tailkick' ) . '</span>' . tailkick_get_svg( array( 'icon' => 'arrow-right' ) ),
        )
      );

      endif; // Check for have_comments().

      // If comments are closed and there are comments, let's leave a little note, shall we?
      if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :

		?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'tailkick' ); ?></p>
		<?php

      endif;

      $comments_args = array(
        'label_submit'        => 'Send',
        'title_reply_before'  => '<div class="font-bold text-xl text-gray-900 border-t border-gray-300 pt-4">',
        'title_reply'         => 'Write a Reply or Comment',
        'title_reply_after'   => '</div>',
        'class_container'     => '',
        'comment_notes_after' => '',
      );

      comment_form($comments_args);

    ?>

</div>
