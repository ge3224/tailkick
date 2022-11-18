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
            <div class="mb-12">
              <h2 class="mb-3 font-bold text-3xl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="text-sm text-gray-500">
                <?php the_time('F j, Y g:i a'); ?>
                <a class="text-teal-500 hover:text-teal-500/75 active:text-teal-500/50 underline" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                  <?php the_author(); ?>
                </a>
              </p>
              <?php if (has_post_thumbnail()) : ?>
                <div class="my-3 overflow-hidden h-96">
                  <span class="object-center w-auto"><?php the_post_thumbnail(); ?></span>
                </div>
              <?php endif; ?>
              <div class="my-3"><?php the_excerpt(); ?></div>
            </div><!-- /.blog-post -->
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

      </div><!-- /.blog-main -->

      <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
          <h4>About</h4>
          <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>
        <div class="sidebar-module">
          <h4>Archives</h4>
          <ol class="list-unstyled">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
            <li><a href="#">November 2013</a></li>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            <li><a href="#">June 2013</a></li>
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
          </ol>
        </div>
        <div class="sidebar-module">
          <h4>Elsewhere</h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>
  <script src="<?php bloginfo('template_url'); ?>/js/tailkick1.js"></script>
</body>

</html>
