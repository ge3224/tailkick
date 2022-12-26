<!DOCTYPE html>
<html class="h-full" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body class="min-h-full flex flex-col">
  <header>
    <?php get_template_part('nav_primary', get_post_format()); ?>
  </header>
    <section
      id="hero"
      style="background:url('<?php echo get_theme_mod('hero_home_image', get_bloginfo('template_url').'/images/tailkick-hero-home-wide.jpg'); ?>') no-repeat center center; background-size: cover;"
      class="bg-gray-200 lg:h-2/3 xl:h-[772px] w-full"
    >
    <div class="w-full h-[767px] max-w-6xl mx-auto flex flex-col justify-center items-start">
      <div class="w-1/5 ml-auto mr-0">
        <h1 class="text-6xl font-bold"><?php echo get_theme_mod('hero_home_heading', 'Buy. Sell. Discover.'); ?></h1>
        <p class="mt-3"><?php echo get_theme_mod('hero_home_text', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.'); ?></p>
        <button class="mt-3 px-4 py-2 bg-teal-300 font-bold border border-black shadow-[6px_6px_0_0_rgba(0,115,100,0.25)]"><?php echo get_theme_mod('btn_text', 'Download'); ?></button>
      </div>
    </div>
  </section>
  <main>
    <?php get_template_part('showcase_panel', get_post_format()); ?>
    <?php get_template_part('feat-1', get_post_format()); ?>
    <?php get_template_part('feat-2', get_post_format()); ?>
    <?php get_template_part('feat-3', get_post_format()); ?>
    <?php get_template_part('testimonials', get_post_format()); ?>
    <?php get_template_part('bottom-banner', get_post_format()); ?>
  </main>
  <footer>
    <?php get_footer(); ?>
  </footer>
</body>

</html>
