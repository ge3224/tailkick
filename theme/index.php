<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>

<body>
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
            <?php get_template_part('content', get_post_format()); ?>
          <?php endwhile; ?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>
        <nav>
          <ul class="pager">
            <li><a href="#">Previous</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </nav>
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