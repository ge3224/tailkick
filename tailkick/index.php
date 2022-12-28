<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css). It is used to
 * dipslay a page when nothing more specific matches a query. E.g., it puts
 * together the homepage when no home.php file exists. 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
  <section class="w-full bg-gray-100 bg-[url('/wp-content/themes/tailkick/images/tk-hero-blog.jpg')] bg-cover bg-center h-80 pt-16 pb-12">
    <div class="mx-auto max-w-6xl h-full flex items-center">
      <div class="w-80">
        <h1 class="text-4xl font-bold">The Tailkick Blog</h1>
        <p>The official example template of creating a blog with Tailkick.</p>
      </div>
    </div>
  </section>
  <main class="my-8">
    <section class="mx-auto max-w-6xl pt-16">
      <div class="grid grid-cols-6">
        <div class="col-span-5 pr-24">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('template-parts/content', get_post_format()); ?>
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
        <?php get_sidebar(); ?>
      </div>
    </section>
  </main>
  <?php get_footer(); ?>
</body>

</html>
