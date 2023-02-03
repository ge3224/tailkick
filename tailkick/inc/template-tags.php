<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage TailKick
 * @since TailKick 0.1
 */

if (!function_exists('tailkick_posted_on')) :
  /**
   * Prints HTML with meta information for the current post-date/time and author.
   */
  function tailkick_posted_on()
  {

    // Get the author name; wrap it in a link.
    $byline = sprintf(
      /* translators: %s: Post author. */
      __('by %s', 'tailkick'),
      '<span class="rtl:px-1 author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a></span>'
    );

    // Finally, let's write all of this to the page.
    echo '<span class="posted-on">' . tailkick_time_link() . '</span><span class="ml-2 text-sm byline"> ' . $byline . '</span>';
  }
endif;


if (!function_exists('tailkick_time_link')) :
  /**
   * Gets a nicely formatted string for the published date.
   */
  function tailkick_time_link()
  {
    $time_string = '<time class="text-xs text-gray-600 entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
      $time_string = 'Last Updated: <time class="text-xs text-gray-600 updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
      $time_string,
      get_the_date(DATE_W3C),
      get_the_date('M d, Y'),
      get_the_modified_date(DATE_W3C),
      get_the_modified_date('M d, Y')
    );

    // Wrap the time string in a link, and preface it with 'Posted on'.
    return sprintf(
      /* translators: %s: Post date. */
      '<span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('Posted on', 'tailkick') . '</span>' . esc_html__('%s', 'tailkick'),
      '<a class="text-xs text-gray-600" href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );
  }
endif;


if (!function_exists('tailkick_entry_footer')) :
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function tailkick_entry_footer()
  {

    $separate_meta = wp_get_list_item_separator();

    // Get Categories for posts.
    $categories_list = get_the_category_list($separate_meta);

    // Get Tags for posts.
    $tags_list = get_the_tag_list('', $separate_meta);

    // We don't want to output .entry-footer if it will be empty, so make sure its not.
    if (((tailkick_categorized_blog() && $categories_list) || $tags_list) || get_edit_post_link()) {

      echo '<footer class="my-6 entry-footer">';

      if ('post' === get_post_type()) {
        if (($categories_list && tailkick_categorized_blog()) || $tags_list) {
          echo '<span class="cat-tags-links">';

          // Make sure there's more than one category before displaying.
          if ($categories_list && tailkick_categorized_blog()) {
            echo '<span class="flex items-center text-xs uppercase font-bold cat-links">' . tailkick_get_svg(array('icon' => 'folder-open')) . '&nbsp;<span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('Categories', 'tailkick') . '</span>' . $categories_list . '</span>';
          }

          if ($tags_list && !is_wp_error($tags_list)) {
            echo '<span class="mt-3 flex items-center text-xs uppercase font-bold tags-links">' . tailkick_get_svg(array('icon' => 'hashtag')) . '&nbsp;<span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('Tags', 'tailkick') . '</span>' . $tags_list . '</span>';
          }

          echo '</span>';
        }
      }

      tailkick_edit_link();

      echo '</footer> <!-- .entry-footer -->';
    }
  }
endif;


if (!function_exists('tailkick_edit_link')) :
  /**
   * Returns an accessibility-friendly link to edit a post or page.
   *
   * This also gives us a little context about what exactly we're editing
   * (post or page?) so that users understand a bit more where they are in terms
   * of the template hierarchy and their content. Helpful when/if the single-page
   * layout with multiple posts/pages shown gets confusing.
   */
  function tailkick_edit_link()
  {
    edit_post_link(
      sprintf(
        /* translators: %s: Post title. Only visible to screen readers. */
        esc_html__('Edit', 'tailkick') . '<span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('%s', 'tailkick') . '</span>',
        get_the_title()
      ),
      '<span class="text-xs text-gray-600 hover:text-gray-600/75 active:text-gray-600/50 edit-link">',
      '</span>'
    );
  }
endif;

/**
 * Display a front page section.
 *
 * @param WP_Customize_Partial $partial Partial associated with a selective refresh request.
 * @param int                  $id Front page section to display.
 */
function tailkick_front_page_section($partial = null, $id = 0)
{
  if (is_a($partial, 'WP_Customize_Partial')) {
    // Find out the ID and set it up during a selective refresh.
    global $tailkickcounter;

    $id = str_replace('panel_', '', $partial->id);

    $tailkickcounter = $id;
  }

  global $post; // Modify the global post object before setting up post data.
  if (get_theme_mod('panel_' . $id)) {
    $post = get_post(get_theme_mod('panel_' . $id));
    setup_postdata($post);
    set_query_var('panel', $id);

    get_template_part('template-parts/page/content', 'front-page-panels');

    wp_reset_postdata();
  } elseif (is_customize_preview()) {
    // The output placeholder anchor.
    printf(
      '<article class="panel-placeholder panel tailkick-panel tailkick-panel%1$s" id="panel%1$s">' .
        '<span class="tailkick-panel-title">%2$s</span></article>',
      $id,
      /* translators: %s: The section ID. */
      sprintf(__('Front Page Section %s Placeholder', 'tailkick'), $id)
    );
  }
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function tailkick_categorized_blog()
{
  $category_count = get_transient('tailkick_categories');

  if (false === $category_count) {
    // Create an array of all the categories that are attached to posts.
    $categories = get_categories(
      array(
        'fields'     => 'ids',
        'hide_empty' => 1,
        // We only need to know if there is more than one category.
        'number'     => 2,
      )
    );

    // Count the number of categories that are attached to the posts.
    $category_count = count($categories);

    set_transient('tailkick_categories', $category_count);
  }

  // Allow viewing case of 0 or 1 categories in post preview.
  if (is_preview()) {
    return true;
  }

  return $category_count > 1;
}


/**
 * Flush out the transients used in tailkick_categorized_blog.
 */
function tailkick_category_transient_flusher()
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient('tailkick_categories');
}
add_action('edit_category', 'tailkick_category_transient_flusher');
add_action('save_post', 'tailkick_category_transient_flusher');

if (!function_exists('tailkick_posts_navigation')) :
  /**
   * Display navigation for posts
   *
   * @since TailKick 0.1
   */
  function tailkick_posts_navigation()
  {

    $prev_arrow = '«';

    if (is_rtl()) {
      $prev_arrow = tailkick_get_svg(array('icon' => 'arrow-right'));
    } else {
      $prev_arrow = tailkick_get_svg(array('icon' => 'arrow-left'));
    }

    $prev = get_previous_post_link(
      implode('', array(
        '<div class="flex items-center font-bold">',
        '<span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('Previous Post', 'tailkick') . '</span>',
        '</span class="nav-title-icon-wrapper">',
        $prev_arrow,
        '&nbsp;%link',
        '</span>',
        '</div>',
      ))
    );

    $next_arrow = '»';

    if (is_rtl()) {
      $next_arrow = tailkick_get_svg(array('icon' => 'arrow-left'));
    } else {
      $next_arrow = tailkick_get_svg(array('icon' => 'arrow-right'));
    }

    $next = get_next_post_link(
      implode('', array(
        '<div class="flex items-center font-bold">',
        '<span class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('Previous Post', 'tailkick') . '</span>',
        '</span class="nav-title-icon-wrapper">',
        '%link&nbsp;',
        $next_arrow,
        '</span>',
        '</div>',
      ))
    );

    echo '<div class="navigation post-navigation" aria-label="Posts">';
    echo '<div class="w-full flex space-x-2 justify-between items-center nav-links">';

    if ($prev) {
      echo $prev;
    } else {
      echo '<div></div>'; // insert an empty div to push the next post link to the right
    }

    if ($next) {
      echo $next;
    }

    echo '</div>';
    echo '</div>';
  }
endif;

if (!function_exists('tailkick_posts_pagination')) :

  /**
   * Display navigation for post pagination.
   *
   * @since TailKick 0.1
   */
  function tailkick_posts_pagination()
  {

    if (wp_count_posts()->publish > 1) {

      // Tailwind styling for pagination links
      $pagination_link_classes = array(
        'table',
        'rounded-sm',
        'hover:bg-gray-100',
        'active:bg-gray-100/75',
        'border',
      );

      // different padding requirements for numbers and arrow icons
      $padding_svg = 'py-[0.550rem] px-1.5';
      $padding_num = 'py-0.5 px-2';

      // spans
      $open_span_svg = '<span class="' . implode(' ', $pagination_link_classes) . ' ' . $padding_svg . '">';
      $open_span_sr = '<span class="' . sr_only_classes(array('screen-reader-text')) . '">';
      $open_span_num = '<span class="' . $padding_num . ' ' . implode(' ', $pagination_link_classes) . '">';

      echo '<nav class="navigation pagination" aria-label="Posts">';
      echo '<div class="flex space-x-2 items-center justify-center nav-links">';
      echo '<h2 class="' . sr_only_classes(array('screen-reader-text')) . '">' . esc_html__('Posts Navigation', 'tailkick') . '</h2>';

      // using `paginate_links` instead of `the_posts_pagination` in order to  manually wrap `nav` and `div` elements.
      echo paginate_links(
        array(
          'prev_text'          => $open_span_svg . tailkick_get_svg(array('icon' => 'arrow-left')) . '</span>' . $open_span_sr . __('Previous page', 'tailkick') . '</span>',
          'next_text'          => $open_span_sr . __('Next page', 'tailkick') . '</span>' . $open_span_svg . tailkick_get_svg(array('icon' => 'arrow-right')) . '</span>',
          'before_page_number' => $open_span_num . $open_span_sr . __('Page', 'tailkick') . ' </span>',
          'after_page_number' => '</span>',
        )
      );

      echo '</div>';
      echo '</nav>';
    }
  }

endif;

if (!function_exists('wp_body_open')) :
  /**
   * Fire the wp_body_open action.
   *
   * Added for backward compatibility to support pre-5.2.0 WordPress versions.
   *
   * @since TailKick 0.1
   */
  function wp_body_open()
  {
    /**
     * Triggered after the opening <body> tag.
     *
     * @since TailKick 0.1
     */
    do_action('wp_body_open');
  }
endif;

if (!function_exists('tailkick_button_special_style')) :

  /**
   * Utility classes by Tailwind used for primary buttons
   */
  function tailkick_button_special_style(): string
  {
    $classes = array(
      'inline-block',
      'cursor-pointer',
      'mb-3',
      'bg-teal-300',
      'hover:bg-gray-800',
      'py-3',
      'px-4',
      'rounded-none',
      'border',
      'border-black',
      'shadow-[4px_4px_0_0_rgba(0,0,0,0.16)]',
      'text-black',
      'visited:text-black',
      'hover:text-white',
      'active:text-white',
      'text-base',
      'font-bold',
      'leading-4',
      'transition',
      'duration-500',
    );

    return implode(' ', $classes);
  }
endif;
