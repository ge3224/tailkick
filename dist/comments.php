<div class="my-12">
  <h2 class="font-bold text-lg">Comments</h2>

  <?php $args = array(
    'walker'            => null,
    'max_depth'         => '',
    'style'             => 'ul',
    'callback'          => null,
    'end-callback'      => null,
    'type'              => 'all',
    'reply_text'        => 'Reply',
    'page'              => '',
    'per_page'          => '',
    'avatar_size'       => 80,
    'reverse_top_level' => null,
    'reverse_children'  => '',
    'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
    'short_ping'        => false,   // @since 3.6
    'echo'              => true     // boolean, default is true
  ); ?>

  <?php
    wp_list_comments($args, $comments);

    $comments_args = array(
            'label_submit'=>'Send',
            'title_reply'=>'Write a Reply or Comment',
            'comment_notes_after' => '',
            'comment_field' => '<p><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea class="border border-gray-400 bg-gray-100 w-72 h-32" id="comment" name="comment" aria-required="true"></textarea></p>',
            'class_submit' => 'cursor-pointer bg-blue-400 hover:bg-blue-400/75 active:bg-blue-400/50 px-6 py-3 font-bold text-white drop-shadow',
    );

    comment_form($comments_args);
  ?>
</div>
