<?php
/**
 * @file
 * Theme settings form.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function mindful_words_form_system_theme_settings_alter(&$form, &$form_state) {
  // Hidden template for JS substitutions.
  $template = '<pre id="css-template" style="display: none;">:root {
  --bedrock-text-color: %text%;
  --bedrock-link-color: %links%;
  --bedrock-bg-color: %base%;
  --bedrock-bg-color-highlight: %highlight%;
  --bedrock-bg-color-secondary: %secondary%;
  --bedrock-border-color: %border%;
  --bedrock-danger-color: %danger%;
  --mindful-words-footer-text: %footertext%;
  --mindful-words-footer-bg: %footerbg%;
}</pre>';
  $form['template'] = array(
    '#type' => 'markup',
    '#markup' => $template,
  );

  $theme_path = backdrop_get_path('theme', 'mindful_words');
  $form['#attached']['css'][] = $theme_path . '/css/color-admin.css';
  // Overrides parts of color.js for a different preview approach.
  $form['#attached']['js'][] = $theme_path . '/js/mindful-words-override.js';
  $settings['mindful_words'] = array(
    'previewUrl' => url('', array('query' => array('preview' => 'mindful_words'))),
  );
  $form['#attached']['js'][] = array(
    'type' => 'setting',
    'data' => $settings,
  );
}
