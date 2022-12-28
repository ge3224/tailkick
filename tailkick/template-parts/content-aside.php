<div id="<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
  <div class="bg-gray-200 p-3">
    <small><a class="text-teal-700 visited:text-teal-700 underline" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>@<?php the_date(); ?></small>
    <?php the_content(); ?>
  </div>
</div>
