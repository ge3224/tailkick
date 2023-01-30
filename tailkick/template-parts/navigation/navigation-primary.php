<?php
/**
 * The primary navbar of TailKick
 *
 * @package WordPress
 * @subpackage TailKick
 */
?>

  <div class="fixed z-[1000] w-full py-4 lg:py-5 px-4 xl:px-0" id="nav-primary">
    <div class="mx-auto flex md:max-w-6xl md:w-full md:justify-between">
      <div class="w-full flex justify-center md:justify-start">
        <div class="max-w-[114px] max-h-[31px] z-20 items-center justify-items-center">
          <a class="no-underline" href="/">
            <?php if( has_custom_logo() ) : ?>
              <?php the_custom_logo(); ?>
            <?php else : ?>
              <div><?php wp_title(); ?></div>
            <?php endif; ?>
          </a>
        </div>
      </div>
      <input class="hidden nav-checkbox" id="nav-checkbox" type="checkbox">
      <?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => 'nav',
        'container_class' => 'absolute md:static top-[63px] border-t border-gray-300 md:border-none left-0 w-full bg-gray-100/95 md:bg-gray-100/0 shadow shadow-zinc-900/20 md:shadow-none nav',
        'walker' => new Tailkick_Menu_Navwalker(), // The following custom arguments will be recognized by Tailkick_Menu_Navwalker
        'menu_class' => 'm-0 md:flex md:justify-end px-0 nav-menu',
        'item_class' => 'relative flex-shrink-0 flex items-center py-6 md:py-0 mx-4 md:ml-7 md:mr-0 md:my-0 border-t md:border-0 border-gray-300 first:border-0',
        'submenu_class' => 'relative w-28 md:absolute md:top-8 md:left-0 mt-4 md:mt-0 p-3 bg-none border-l-2 border-white/30 md:border-none md:bg-white/80 rounded shadow shadow-zinc-900/20 hidden',
        'subitem_class' => 'flex-shrink-0 no-underline',
        'parent_after' => '<span class="hover:bg-white/80 border border-gray-700/0 hover:border-gray-700/50 hover:cursor-pointer rounded" data-ui="nav-dropdown"><svg class="w-auto h-6" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="fill-gray-800" d="M36 19L24 31L12 19H36Z"></path></svg></span>',
      )); ?>
      <label class="absolute top-4 left-4 w-6 h-6 flex items-center md:hidden" for="nav-checkbox">
        <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="stroke-gray-400/90" d="M7.94971 11.9497H39.9497" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
          <path class="stroke-gray-400/90" d="M7.94971 23.9497H39.9497" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
          <path class="stroke-gray-400/90" d="M7.94971 35.9497H39.9497" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </label>
    </div>
  </div>
