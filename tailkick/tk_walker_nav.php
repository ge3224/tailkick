<?php

class Tailkick_Menu_Navwalker extends Walker_Nav_Menu
{
  /**
   * What the class handles.
   *
   * @since 3.0.0
   * @var string
   *
   * @see Walker::$tree_type
   */
  public $tree_type = array('post_type', 'taxonomy', 'custom');

  /**
   * Database fields to use.
   *
   * @since 3.0.0
   * @todo Decouple this.
   * @var string[]
   *
   * @see Walker::$db_fields
   */
  public $db_fields = array(
    'parent' => 'menu_item_parent',
    'id'     => 'db_id',
  );

  /**
   * Data attributes that JS will be looking for in the DOM.
   */
  public $el_dataset = array(
    'submenu' => 'nav-parent',
    'subitem' => 'nav-child',
  );

  /**
   * Starts the list before the elements are added.
   *
   * @since 3.0.0
   *
   * @see Walker::start_lvl()
   *
   * @param string   $output Used to append additional content (passed by reference).
   * @param int      $depth  Depth of menu item. Used for padding.
   * @param stdClass $args   An object of wp_nav_menu() arguments.
   */
  public function start_lvl(&$output, $depth = 0, $args = null)
  {
    if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = str_repeat($t, $depth);

    $classes   = isset($args->submenu_class) ? (array) $args->submenu_class : array();

    /**
     * Filters the CSS class(es) applied to a menu list element.
     *
     * @since 4.8.0
     *
     * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
     * @param stdClass $args    An object of `wp_nav_menu()` arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = implode(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    $output .= "{$n}{$indent}<ul$class_names data-ui=\"submenu-list\">{$n}";
  }

  /**
   * Ends the list of after the elements are added.
   *
   * @since 3.0.0
   *
   * @see Walker::end_lvl()
   *
   * @param string   $output Used to append additional content (passed by reference).
   * @param int      $depth  Depth of menu item. Used for padding.
   * @param stdClass $args   An object of wp_nav_menu() arguments.
   */
  public function end_lvl(&$output, $depth = 0, $args = null)
  {
    if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent  = str_repeat($t, $depth);

    // nav dropdown button

    $button_classes = implode(' ', array(
      'mb-0',
      'mx-1',
      'shadow-none',
      'bg-transparent',
      'hover:bg-white',
      'border-gray-500/0',
      'hover:border-gray-500',
      'rounded-sm',
      'pt-0.5',
      'pb-1.5',
      'px-1',
    ));

    $output .= "$indent</ul>{$n}";
    $output .= '<button for="nav-dropdown" class="' . $button_classes . '" aria-expanded="false" data-ui="nav-dropdown">';
    $output .= '<svg xmlns="http://www.w3.trg/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true" focusable="false" data-ui="arrow-up">';
    $output .= '<g transform="translate(0 2)"><path class="stroke-gray-800" d="M1.50002 4L6.00002 8L10.5 4" stroke-width="1.5"></g></path>';
    $output .= '</svg>';
    $output .= '<svg class="hidden" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true" focusable="false" data-ui="arrow-down">';
    $output .= '<g transform="scale(1 -1) translate(0 -14)"><path class="stroke-gray-800" d="M1.50002 4L6.00002 8L10.5 4" stroke-width="1.5"></g></path>';
    $output .= '</svg>';
    $output .= '</button>';
  }

  /**
   * Starts the element output.
   *
   * @since 3.0.0
   * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
   * @since 5.9.0 Renamed `$item` to `$data_object` and `$id` to `$current_object_id`
   *              to match parent class for PHP 8 named parameter support.
   *
   * @see Walker::start_el()
   *
   * @param string   $output            Used to append additional content (passed by reference).
   * @param WP_Post  $data_object       Menu item data object.
   * @param int      $depth             Depth of menu item. Used for padding.
   * @param stdClass $args              An object of wp_nav_menu() arguments.
   * @param int      $current_object_id Optional. ID of the current menu item. Default 0.
   */
  public function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
  {
    // Restores the more descriptive, specific name for use within this method.
    $menu_item = $data_object;

    if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = ($depth) ? str_repeat($t, $depth) : '';

    $classes   = isset($args->item_class) ? (array) $args->item_class : array();

    if (isset($args->subitem_class) && $depth > 0) {
      $classes = (array) $args->subitem_class;
    }

    if (!empty($menu_item->classes)) {
      $classes = array_merge($classes, $menu_item->classes);
    }
    $classes[] = 'menu-item-' . $menu_item->ID;

    /**
     * Filters the arguments for a single nav menu item.
     *
     * @since 4.4.0
     *
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param WP_Post  $menu_item Menu item data object.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $args = apply_filters('nav_menu_item_args', $args, $menu_item, $depth);

    /**
     * Filters the CSS classes applied to a menu item's list item element.
     *
     * @since 3.0.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
     * @param WP_Post  $menu_item The current menu item object.
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item, $args, $depth));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    /**
     * Filters the ID attribute applied to a menu item's list item element.
     *
     * @since 3.0.1
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string   $menu_item_id The ID attribute applied to the menu item's `<li>` element.
     * @param WP_Post  $menu_item    The current menu item.
     * @param stdClass $args         An object of wp_nav_menu() arguments.
     * @param int      $depth        Depth of menu item. Used for padding.
     */
    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $menu_item->ID, $menu_item, $args, $depth);
    $id = $id ? ' id="' . esc_attr($id) . '"' : '';

    if ($this->has_children) {
      $output .= $indent . '<li' . $id . $class_names . ' data-ui="' . esc_attr($this->el_dataset['submenu']) . '">';
    } else if (isset($args->subitem_class) && $depth > 0) {
      $output .= $indent . '<li' . $id . $class_names . ' data-ui="' . esc_attr($this->el_dataset['subitem']) . '">';
    } else {
      $output .= $indent . '<li' . $id . $class_names . '>';
    }

    $atts           = array();
    $atts['title']  = !empty($menu_item->attr_title) ? $menu_item->attr_title : '';
    $atts['target'] = !empty($menu_item->target) ? $menu_item->target : '';
    if ('_blank' === $menu_item->target && empty($menu_item->xfn)) {
      $atts['rel'] = 'noopener';
    } else {
      $atts['rel'] = $menu_item->xfn;
    }
    $atts['href']         = !empty($menu_item->url) ? $menu_item->url : '';
    $atts['aria-current'] = $menu_item->current ? 'page' : '';

    /**
     * Filters the HTML attributes applied to a menu item's anchor element.
     *
     * @since 3.6.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
     *
     *     @type string $title        Title attribute.
     *     @type string $target       Target attribute.
     *     @type string $rel          The rel attribute.
     *     @type string $href         The href attribute.
     *     @type string $aria-current The aria-current attribute.
     * }
     * @param WP_Post  $menu_item The current menu item object.
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $atts = apply_filters('nav_menu_link_attributes', $atts, $menu_item, $args, $depth);

    $attributes = '';
    foreach ($atts as $attr => $value) {
      if (is_scalar($value) && '' !== $value && false !== $value) {
        $value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    /** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters('the_title', $menu_item->title, $menu_item->ID);

    /**
     * Filters a menu item's title.
     *
     * @since 4.4.0
     *
     * @param string   $title     The menu item's title.
     * @param WP_Post  $menu_item The current menu item object.
     * @param stdClass $args      An object of wp_nav_menu() arguments.
     * @param int      $depth     Depth of menu item. Used for padding.
     */
    $title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);

    $a_classes = isset($args->link_class) ? (array) $args->link_class : array();
    if (strpos($attributes, 'class="') !== false) {
      $attributes = str_replace('class="', 'class="' . implode(' ', $a_classes), $attributes);
    } else {
      $attributes .= ' class="' . implode(' ', $a_classes) . '"';
    }

    $item_output  = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $title . '&nbsp;' . $args->link_after;
    $item_output .= '</a>';

    /**
     * Filters a menu item's starting output.
     *
     * The menu item's starting output only includes `$args->before`, the opening `<a>`,
     * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
     * no filter for modifying the opening and closing `<li>` for a menu item.
     *
     * @since 3.0.0
     *
     * @param string   $item_output The menu item's starting HTML output.
     * @param WP_Post  $menu_item   Menu item data object.
     * @param int      $depth       Depth of menu item. Used for padding.
     * @param stdClass $args        An object of wp_nav_menu() arguments.
     */
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $menu_item, $depth, $args);
  }

  /**
   * Ends the element output, if needed.
   *
   * @since 3.0.0
   * @since 5.9.0 Renamed `$item` to `$data_object` to match parent class for PHP 8 named parameter support.
   *
   * @see Walker::end_el()
   *
   * @param string   $output      Used to append additional content (passed by reference).
   * @param WP_Post  $data_object Menu item data object. Not used.
   * @param int      $depth       Depth of page. Not Used.
   * @param stdClass $args        An object of wp_nav_menu() arguments.
   */
  public function end_el(&$output, $data_object, $depth = 0, $args = null)
  {
    if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $output .= "</li>{$n}";
  }
}
