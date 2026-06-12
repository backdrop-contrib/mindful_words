<?php
/**
 * @file
 */

/**
 * Implements hook_preprocess_HOOK().
 */
function mindful_words_preprocess_page(&$variables) {
  backdrop_add_library('system', 'opensans', TRUE);

  // Avoid backdrop_add_icon() because it relies on JS and is jumpy, which is
  // irritating especially in the header.
  $path = base_path() . 'core/misc/icons';
  $inline_css = ":root {
  --mindful-icon-arrow-circle-right: url($path/arrow-circle-right.svg);
  --mindful-icon-arrow-circle-left: url($path/arrow-circle-left.svg);
  --mindful-icon-magnifying-glass: url($path/magnifying-glass.svg);
  --mindful-icon-tag: url($path/tag.svg);
}";
  backdrop_add_css($inline_css, 'inline');

  // Prevent the "jumping menu" problem with some inline CSS by using the same
  // breakpoint that the dropdown menu has.
  $breakpoint = '48em';
  $config = config('menu.settings');
  if ($config->get('menu_breakpoint') != 'default') {
    $breakpoint = $config->get('menu_breakpoint_custom');
  }
  // This selector has to be slightly more important, as the styles.css file is
  // always after this inline style.
  $css = ".l-header .l-header-inner {flex-direction: row;align-items: end;}";
  $media = "all and (min-width: $breakpoint)";
  backdrop_add_css($css, array('type' => 'inline', 'media' => $media));
}

/**
 * Implements hook_tinymce_options_alter().
 */
function mindful_words_tinymce_options_alter(array &$options, $format) {
  // Squeeze in the color scheme, if possible (only runs if this is the active
  // theme.)
  $color_paths = theme_get_setting('color.stylesheets', 'mindful_words');
  if (!empty($color_paths) && $url = file_create_url($color_paths[0])) {
    $options['tiny_options']['content_css'][] = $url;
  }
}

/**
 * Override theme_feed_icon().
 */
function mindful_words_feed_icon($variables) {
  $options = array(
    'alt' => $variables['title'],
    'attributes' => array(
      'width' => 50,
      'height' => 50,
    ),
  );
  $icon = icon('rss-fill', $options);
  return l($icon, $variables['url'], array(
    'html' => TRUE,
    'attributes' => array(
      'class' => array('feed-icon'),
      'title' => $variables['title'],
    ),
  ));
}

/**
 * Implements hook_node_view_alter().
 */
function mindful_words_node_view_alter(&$build) {
  if ($build['#view_mode'] != 'full' && module_exists('comment')) {
    // It makes no sense to display "Login to post comments" on every node
    // teaser, ten or more times per page.
    if (!empty($build['links']['comment']['#links'])) {
      unset($build['links']['comment']['#links']['comment-forbidden']);
    }
  }
}
