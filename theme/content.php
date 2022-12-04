<div class="my-12">
  <h2 class="font-bold text-4xl">
    <?php if (is_single()) : ?>
      <?php the_title(); ?>
    <?php else : ?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php endif; ?>
  </h2>
  <p class="text-gray-500 text-sm">
    <?php the_time('F j, Y g:i a'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
  </p>
  <?php if (has_post_thumbnail()) : ?>
    <?php if (!is_single()) : ?>
      <div class="overflow-hidden w-full h-96">
        <span class="object-center">
          <?php the_post_thumbnail(); ?>
        </span>
      </div>
    <?php else : ?>
      <div>
        <?php the_post_thumbnail(); ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  <?php if (is_single()) : ?>
    <?php the_content(); ?>
  <?php else : ?>
    <?php the_excerpt(); ?>
  <?php endif; ?>
  <?php if (is_single()) : ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</div>