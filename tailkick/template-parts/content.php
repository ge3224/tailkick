<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
?>
<div id="<?php the_ID(); ?>" <?php post_class('mb-16'); ?>>
  <h2 class="font-bold text-4xl">
    <?php if (is_single()) : ?>
      <?php the_title(); ?>
    <?php else : ?>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php endif; ?>
  </h2>
  <p class="my-2 text-gray-500 text-sm">
    <?php the_time('F j, Y g:i a'); ?> <a class="text-teal-500 visited:text-teal-500 underline" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
  </p>
  <?php if (has_post_thumbnail()) : ?>
    <?php if (!is_single()) : ?>
      <figure class="overflow-hidden w-full h-[500px] mb-3">
        <?php the_post_thumbnail('post-thumbnail', ['class' => 'object-fill object-center rounded-sm'] ); ?>
      </figure>
    <?php else : ?>
      <figure>
        <?php the_post_thumbnail(); ?>
      </figure>
    <?php endif; ?>
  <?php endif; ?>
  <?php if (is_single()) : ?>
    <div class="my-4"><?php the_content(); ?></div>
  <?php else : ?>
    <?php the_excerpt(); ?>
  <?php endif; ?>
  <?php if (is_single()) : ?>
    <?php comments_template(); ?>
  <?php endif; ?>
</div>
