<!DOCTYPE html>
<html class="h-full" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body class="m-0 min-h-full flex flex-col">
  <?php get_template_part('nav_primary', get_post_format()); ?>
  <main>
    <div class="mx-auto max-w-6xl pt-28">
      <div class="grid grid-cols-6">
        <div class="col-span-5 pr-24">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="mb-12">
                <h2 class="mb-3 font-bold text-3xl"><?php the_title(); ?></h2>
                <div class="my-3"><?php the_content(); ?></div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <p><?php __('No Page Found'); ?></p>
          <?php endif; ?>
        </div>
        <div>
          <?php if (is_active_sidebar('sidebar')) : ?>
            <?php dynamic_sidebar('sidebar'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </main>
  <?php get_footer(); ?>
</body>

</html>
