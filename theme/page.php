<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>

<body class="flex flex-col min-h-full">
  <?php get_template_part('nav_primary', get_post_format()); ?>
  <div class="mx-auto max-w-6xl pt-16">
    <div class="my-12 bg-gray-200 pt-4 px-4 pb-16">
      <h1 class="text-4xl font-bold">The Tailkick Blog</h1>
      <p class="text-xl">The official example template of creating a blog with Tailkick 1.</p>
    </div>
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
  <?php get_footer(); ?>
  <script src="<?php bloginfo('template_url'); ?>/js/tailkick1.js"></script>
</body>

</html>
