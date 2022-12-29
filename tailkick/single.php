<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
?>
<!DOCTYPE html>
<html class="h-full" <?php language_attributes(); ?>>
<?php get_header(); ?>

<body <?php body_class('min-h-full flex flex-col'); ?>>
  <?php get_template_part('template-parts/nav-primary', get_post_format()); ?>
  <div class="mx-auto max-w-6xl pt-24">
    <div class="grid grid-cols-6">
      <div class="col-span-5 pr-24">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', get_post_format()); ?>
          <?php endwhile; ?>
        <?php else : ?>
          <p><?php __('No Posts Found'); ?></p>
        <?php endif; ?>
      </div>
      <?php get_sidebar('footer'); ?>
    </div>
  </div>
  <?php get_footer(); ?>
</body>

</html>
