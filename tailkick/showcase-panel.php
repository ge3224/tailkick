<?php
/**
 * Showcase panel for the TailKick WordPress theme
 *
 * @package WordPress
 * @subpackage TailKick
 */
?>

<section class="mx-auto max-w-6xl w-full flex justify-between py-14 space-x-16" id="showcase_panel">
  <div class="flex flex-col justify-center align-middle">
    <div class="w-28 mx-auto">
      <img class="w-full h-auto" src="<?php echo get_theme_mod('showcase_box1_img', get_bloginfo('template_url').'/images/tk-heart-ico.png'); ?>">
    </div>
    <h3 class="mt-3 font-bold text-3xl text-center"><?php echo get_theme_mod('showcase_box1_heading', 'Show It'); ?></h3>
    <p class="mt-3"><?php echo get_theme_mod('showcase_box1_text', 'Duis nec ante lorem. Ut vestibulum nibh id auctor semper. Etiam consectetur accumsan dui sed malesuada.'); ?></p>
  </div>
  <div class="flex flex-col justify-center align-middle">
    <div class="w-28 mx-auto">
      <img class="w-full h-auto" src="<?php echo get_theme_mod('showcase_box2_img', get_bloginfo('template_url').'/images/tk-boombox-ico.png'); ?>">
    </div>
    <h3 class="mt-3 font-bold text-3xl text-center"><?php echo get_theme_mod('showcase_box2_heading', 'Sing It'); ?></h3>
    <p class="mt-3"><?php echo get_theme_mod('showcase_box2_text', 'Curabitur ut ligula at turpis efficitur auctor elementum sed risus. Morbi egestas consectetur suscipit. Sed vitae lobortis purus.'); ?></p>
  </div>
  <div class="flex flex-col justify-center align-middle">
    <div class="w-28 mx-auto">
      <img class="w-full h-auto" src="<?php echo get_theme_mod('showcase_box3_img', get_bloginfo('template_url').'/images/tk-check-ico.png'); ?>">
    </div>
    <h3 class="mt-3 font-bold text-3xl text-center"><?php echo get_theme_mod('showcase_box3_heading', 'Share It'); ?></h3>
    <p class="mt-3"><?php echo get_theme_mod('showcase_box3_text', 'Quisque efficitur finibus nibh sit amet varius. Etiam ante purus, ullamcorper vitae massa vel, ornare euismod sapien.'); ?></p>
  </div>
</section>
