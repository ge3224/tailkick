<?php
 /**
 * A full-width banner for TailKick
 *
 * @package WordPress
 * @subpackage TailKick
 */
?>

<section id="call-to-action" class="mb-8">
  <div class="mx-auto max-w-6xl h-96 bg-gray-100 bg-[url('/wp-content/themes/tailkick/images/tk-cta-1.jpg')] bg-cover bg-center rounded-sm px-8 flex flex-col space-y-3 justify-center">
    <div class="max-w-xs">
      <h3 class="font-bold text-3xl text-white">Dare to be Different</h3>
      <p class="text-white">Lorem ipsum dolor sit amet consectetur. Interdum turpis enim sodales orci nullam turpis.</p>
      <?php get_template_part('button', null, array('text' => 'Get Started', 'link' => 'https://github.com/ge3224/tailkick', 'target' => '_blank')); ?>
    </div>
  </div>
</section>
