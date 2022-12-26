<!DOCTYPE html>
<html class="h-full" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body class="min-h-full flex flex-col">
  <?php get_template_part('nav_primary', get_post_format()); ?>
  <div class="mx-auto max-w-6xl pt-24">
    <div class="grid grid-cols-6">
      <div class="col-span-5 pr-24">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', get_post_format()); ?>
          <?php endwhile; ?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>
      </div>
      <div>
        <?php if (is_active_sidebar('primary_sidebar')) : ?>
          <?php dynamic_sidebar('primary_sidebar'); ?>
        <?php else : ?> 
          <p><?php __('No Sidebar Widgets Found'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>
</body>

</html>
