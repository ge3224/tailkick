<!DOCTYPE html>
<html class="h-full" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body class="min-h-full flex flex-col">
  <header>
    <?php get_template_part('nav_primary', get_post_format()); ?>
  </header>
  <section id="hero" class="bg-gray-200 bg-[url('/wp-content/themes/tailkick_1/images/tailkick-hero-home-wide.jpg')] bg-cover bg-center xl:bg-[center_top_38%] bg-no-repeat lg:h-2/3 xl:h-[774px] w-full">
    <div class="w-full h-[767px] max-w-6xl mx-auto flex flex-col justify-center items-start">
      <div class="w-1/5 ml-auto mr-0">
        <h1 class="text-6xl font-bold">Buy. Sell. Discover.</h1>
        <p class="mt-3">Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.</p>
        <button class="mt-3 px-4 py-2 bg-teal-300 font-bold border border-black shadow-[6px_6px_0_0_rgba(0,115,100,0.25)]">Download</button>
      </div>
    </div>
  </section>
  <main>
    <?php get_template_part('callouts', get_post_format()); ?>
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
