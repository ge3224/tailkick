<?php
/**
 * The template part for displaying gallery post formats 
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */
?>
<div class="mb-12">
  <div id="<?php the_ID(); ?>" <?php post_class('bg-gray-200 p-3 text-center'); ?>>
    <h2 class="font-bold text-2xl mb-3"><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </div>
</div>
