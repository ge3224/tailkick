  <div class="fixed z-10 w-full py-4 lg:py-5 px-4 xl:px-0" id="nav-primary">
    <div class="mx-auto flex md:max-w-6xl md:w-full md:justify-between">
      <div class="w-full flex justify-center md:justify-start">
        <div class="z-20 items-center justify-items-center">
          <a class="no-underline" href="/">
            <svg class="w-auto h-7 drop-shadow-sm" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M44 39.8198H4L36.54 21.8198H44V39.8198Z" fill="none" stroke="#333" stroke-width="4" stroke-miterlimit="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M3.85742 19.2012L7.08947 20.7992L24.41 10.7992L24.642 7.20117" stroke="#333" stroke-width="4" stroke-miterlimit="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M12.3301 24.8799C13.9869 24.8799 15.3301 23.5367 15.3301 21.8799C15.3301 20.223 13.9869 18.8799 12.3301 18.8799C10.6732 18.8799 9.33008 20.223 9.33008 21.8799C9.33008 23.5367 10.6732 24.8799 12.3301 24.8799Z" fill="#333" />
              <path d="M23.4502 18.8799C25.107 18.8799 26.4502 17.5367 26.4502 15.8799C26.4502 14.223 25.107 12.8799 23.4502 12.8799C21.7933 12.8799 20.4502 14.223 20.4502 15.8799C20.4502 17.5367 21.7933 18.8799 23.4502 18.8799Z" fill="#333" />
            </svg>
          </a>
        </div>
      </div>
      <input class="hidden nav-checkbox" id="nav-checkbox" type="checkbox">
      <?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => 'div',
        'container_class' => 'absolute top-14 left-0 w-full bg-slate-700/95 shadow shadow-zinc-900/10 nav',
        'walker' => new Tailkick_Menu_Navwalker(),
        /*The following custome arguments will recognized by Tailkick_Menu_Navwalker*/
        'menu_class' => 'm-0 md:flex md:justify-end px-0 nav-menu',
        'item_class' => 'relative flex-shrink-0 flex items-center py-6 md:py-0 mx-4 md:ml-7 md:mr-0 md:my-0 border-t md:border-0 border-white/30 first:border-0',
        'submenu_class' => 'relative w-28 md:absolute md:top-8 md:left-0 mt-4 md:mt-0 px-4 bg-none border-l-2 border-white/30 md:border-none md:bg-white/80 rounded-sm shadow shadow-zinc-900/20 hidden',
        'subitem_class' => 'flex-shrink-0 no-underline',
        /* 'parent_after' => '<span><svg class="w-4 h-auto" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="fill-black" d="M36 19L24 31L12 19H36Z"></path></svg></span>', */
      )); ?>
      <label class="absolute top-4 left-4 w-6 h-6 flex items-center md:hidden" for="nav-checkbox">
        <svg width="24" height="24" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path class="stroke-white/90" d="M7.94971 11.9497H39.9497" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
          <path class="stroke-white/90" d="M7.94971 23.9497H39.9497" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
          <path class="stroke-white/90" d="M7.94971 35.9497H39.9497" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </label>
    </div>
  </div>
