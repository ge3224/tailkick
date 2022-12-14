<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_header(); ?>

<body>
  <header>
    <?php get_template_part('nav_primary', get_post_format()); ?>
  </header>
  <main>
    <section id="hero" class="bg-gray-200 bg-[url('/wp-content/themes/tailkick_1/images/tailkick-hero-home-wide.jpg')] bg-cover bg-[center_top_45%] h-[767px] w-full">
      <div class="w-full h-[767px] max-w-6xl mx-auto flex flex-col justify-center items-start">
        <div class="w-1/5 ml-auto mr-0">
          <h1 class="text-6xl font-bold">Buy. Sell. Discover.</h1>
          <p class="mt-3">Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.</p>
          <button class="mt-3 px-4 py-2 bg-teal-300 font-bold border border-black shadow-[6px_6px_0_0_rgba(0,115,100,0.25)]">Download</button>
        </div>
      </div>
    </section>
    <section id="3-icons" class="mx-auto max-w-6xl w-full flex justify-between py-14 space-x-16">
      <div class="flex flex-col justify-center align-middle">
        <div class="w-28 mx-auto">
          <img class="w-full h-auto" src="/wp-content/themes/tailkick_1/images/tk-heart-ico.svg">
        </div>
        <h3 class="mt-3 font-bold text-3xl text-center">Show It</h3>
        <p class="mt-3">Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.</p>
      </div>
      <div class="flex flex-col justify-center align-middle">
        <div class="w-28 mx-auto">
          <img class="w-full h-auto" src="/wp-content/themes/tailkick_1/images/tk-boombox-ico.svg">
        </div>
        <h3 class="mt-3 font-bold text-3xl text-center">Sing It</h3>
        <p class="mt-3">Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.</p>
      </div>
      <div class="flex flex-col justify-center align-middle">
        <div class="w-28 mx-auto">
          <img class="w-full h-auto" src="/wp-content/themes/tailkick_1/images/tk-check-ico.svg">
        </div>
        <h3 class="mt-3 font-bold text-3xl text-center">Share It</h3>
        <p class="mt-3">Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id.</p>
      </div>
    </section>
    <section id="post-1" class="relative flex items-center">
      <div class="absolute left-0 top-0 right-0 bottom-0">
        <svg class="w-full h-full" viewBox="0 0 1728 302" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="fill-gray-100" d="M0 0L1728 68V234L-0 302Z" />
        </svg>
      </div>
      <div class="w-full max-w-6xl mx-auto relative h-[391px] flex space-x-16 justify-between items-center">
        <div class="max-w-lg">
          <img class="object-cover rounded-sm" src="/wp-content/themes/tailkick_1/images/tk-vignette-1.jpg" />
        </div class="max-w-lg">
        <div>
          <h3 class="font-bold text-3xl">Wear Your Aesthetic</h3>
          <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id. [ ... ]</p>
          <button class="mt-3 px-4 py-2 bg-teal-300 font-bold border border-black shadow-[6px_6px_0_0_rgba(0,115,100,0.25)]">Learn More</button>
        </div>
      </div>
    </section>
    <section id="post-2" class="relative flex items-center">
      <div class="absolute left-0 top-0 right-0 bottom-0">
        <svg class="w-full h-full" viewBox="0 0 1728 302" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="fill-gray-100" d="M0 68L1728 0V302L-0 234Z" />
        </svg>
      </div>
      <div class="w-full max-w-6xl mx-auto relative h-[391px] flex space-x-16 justify-between items-center">
        <div>
          <h3 class="font-bold text-3xl">Outer Influence</h3>
          <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id. [ ... ]</p>
          <button class="mt-3 px-4 py-2 bg-teal-300 font-bold border border-black shadow-[6px_6px_0_0_rgba(0,115,100,0.25)]">Learn More</button>
        </div>
        <div class="max-w-lg">
          <img class="object-cover rounded-sm" src="/wp-content/themes/tailkick_1/images/tk-vignette-2.jpg" />
        </div class="max-w-lg">
      </div>
    </section>
    <section id="post-3" class="relative flex items-center">
      <div class="absolute left-0 top-0 right-0 bottom-0">
        <svg class="w-full h-full" viewBox="0 0 1728 302" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="fill-gray-100" d="M0 0L0 0L1728 68V234L-0 302Z" />
        </svg>
      </div>
      <div class="w-full max-w-6xl mx-auto relative h-[391px] flex space-x-16 justify-between items-center">
        <div class="max-w-lg">
          <img class="object-cover rounded-sm" src="/wp-content/themes/tailkick_1/images/tk-vignette-3.jpg" />
        </div class="max-w-lg">
        <div>
          <h3 class="font-bold text-3xl">Old But Gold</h3>
          <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum luctus gravida neque, et fringilla erat aliquet id. [ ... ]</p>
          <button class="mt-3 px-4 py-2 bg-teal-300 font-bold border border-black shadow-[6px_6px_0_0_rgba(0,115,100,0.25)]">Learn More</button>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <?php get_footer(); ?>
  </footer>
  <script src="<?php bloginfo('template_url'); ?>/js/tailkick1.js"></script>
</body>

</html>
