<?php

/**
 * Showcase panel for the TailKick WordPress theme
 *
 * @package WordPress
 * @subpackage TailKick
 */
?>

<section class="mx-auto max-w-6xl w-full flex flex-col md:flex-row justify-between px-1 xs:px-4 xl:px-0 py-6 md:py-14 gap-y-6 md:gap-y-0 md:gap-x-16" id="showcase_panel">
  <div class="flex flex-col xs:flex-row md:flex-col justify-center items-center md:items-start gap-y-3 gap-x-8 align-middle">
    <div class="xs:xs:flex-shrink-0 w-24 md:w-28 mx-auto">
      <img class="w-full h-auto" src="<?php echo esc_url(get_theme_mod('showcase_box1_img', get_template_directory_uri('template_url') . '/assets/images/tk-heart-ico.png')); ?>">
    </div>
    <div class="flex flex-col items-center xs:items-start md:items-center">
      <h3 class="mt-3 font-bold text-3xl"><?php echo esc_html(get_theme_mod('showcase_box1_heading', 'Show It')); ?></h3>
      <p class="mt-3"><?php echo esc_html(get_theme_mod('showcase_box1_text', 'Duis nec ante lorem. Ut vestibulum nibh id auctor semper. Etiam consectetur accumsan dui sed malesuada.')); ?></p>
    </div>
  </div>
  <div class="flex flex-col xs:flex-row md:flex-col justify-center items-center md:items-start gap-y-3 gap-x-8 align-middle">
    <div class="xs:flex-shrink-0 w-24 md:w-28 mx-auto">
      <img class="w-full h-auto" src="<?php echo esc_url(get_theme_mod('showcase_box2_img', get_template_directory_uri('template_url') . '/assets/images/tk-boombox-ico.png')); ?>">
    </div>
    <div class="flex flex-col items-center xs:items-start md:items-center">
      <h3 class="mt-3 font-bold text-3xl"><?php echo esc_html(get_theme_mod('showcase_box2_heading', 'Sing It')); ?></h3>
      <p class="mt-3"><?php echo esc_html(get_theme_mod('showcase_box2_text', 'Curabitur ut ligula at turpis efficitur auctor elementum sed risus. Morbi egestas consectetur suscipit. Sed vitae lobortis purus.')); ?></p>
    </div>
  </div>
  <div class="flex flex-col xs:flex-row md:flex-col justify-center items-center md:items-start gap-y-3 gap-x-8 align-middle">
    <div class="xs:flex-shrink-0 w-24 md:w-28 mx-auto">
      <img class="w-full h-auto" src="<?php echo esc_url(get_theme_mod('showcase_box3_img', get_template_directory_uri('template_url') . '/assets/images/tk-check-ico.png')); ?>">
    </div>
    <div class="flex flex-col items-center xs:items-start md:items-center">
      <h3 class="mt-3 font-bold text-3xl"><?php echo esc_html(get_theme_mod('showcase_box3_heading', 'Share It')); ?></h3>
      <p class="mt-3"><?php echo esc_html(get_theme_mod('showcase_box3_text', 'Quisque efficitur finibus nibh sit amet varius. Etiam ante purus, ullamcorper vitae massa vel, ornare euismod sapien.')); ?></p>
    </div>
  </div>
</section>
