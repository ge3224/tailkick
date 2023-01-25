<?php

/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>
<div class="w-full max-w-xs flex flex-col site-info">
  <?php if (has_nav_menu('social')) : ?>
    <nav class="pb-4 social-navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'tailkick'); ?>">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'social',
          'menu_class'     => 'flex items-center space-x-1 social-links-menu',
          'depth'          => 1,
          'link_before'    => '<span class="' . sr_only_classes(array('screen-reader-text')) . '">',
          'link_after'     => '</span>' . tailkick_get_svg(array('icon' => 'chain')),
        )
      );
      ?>
    </nav>
  <?php endif; ?>
  <span><strong>Theme: <?php bloginfo('name'); ?></strong> &copy; <?php echo Date('Y'); ?></span>
  <span>Powered by
    <a href="<?php echo esc_url(__('https://wordpress.org/', 'tailkick')); ?>" target="_blank" class="imprint">
      <?php
      /* translators: %s: WordPress */
      printf(esc_html__('%s', 'tailkick'), 'WordPress');
      ?>
    </a>
    &nbsp;&&nbsp;
    <a href="<?php echo esc_url(__('https://tailwindcss.com/', 'tailkick')); ?>" target="_blank" class="imprint">
      <?php
      /* translators: %s: Tailwind CSS */
      printf(esc_html__('%s', 'tailkick'), 'Tailwind CSS');
      ?>
    </a>
  </span>
  <?php
  if (function_exists('the_privacy_policy_link')) {
    the_privacy_policy_link('', '<span role="separator" aria-hidden="true"></span>');
  }
  ?>
</div>
