<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 * @version 0.1
 */

?>
<div class="custom-header">

		<div class="custom-header-media">
			<?php the_custom_header_markup(); ?>
		</div>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

</div><!-- .custom-header -->
