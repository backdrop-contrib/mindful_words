<?php
/**
 * @file
 * Color module support.
 */

/**
 * Color schemes information.
 */
$info = array(
  'fields' => array(
    'base' => t('Main background'),
    'text' => t('Text color'),
    'links' => t('Link color'),
    'highlight' => t('Highlighted background'),
    'secondary' => t('Secondary background'),
    'border' => t('Border color'),
    'danger' => t('Danger color'),
    'footertext' => t('Footer text'),
    'footerbg' => t('Footer background'),
  ),
  'schemes' => array(
    'default' => array(
      'title' => t('Default'),
      'colors' => array(
        'base' => '#f6f8f9',
        'text' => '#62666a',
        'links' => '#076277',
        'highlight' => '#ffffff',
        'secondary' => '#e5eeec',
        'border' => '#bbbbbb',
        'danger' => '#c10000',
        'footertext' => '#e5eeed',
        'footerbg' => '#62666b',
      ),
    ),
    'bright' => array(
      'title' => t('Bright'),
      'colors' => array(
        'base' => '#ffffff',
        'text' => '#717171',
        'links' => '#796d88',
        'highlight' => '#f7f7f7',
        'secondary' => '#fbfbfb',
        'border' => '#bbbbbb',
        'danger' => '#c10000',
        'footertext' => '#6c6c6c',
        'footerbg' => '#f2f2f2',
      ),
    ),
    'dark' => array(
      'title' => t('Dark'),
      'colors' => array(
        'base' => '#333333',
        'text' => '#eeeeee',
        'links' => '#b7cc6d',
        'highlight' => '#282828',
        'secondary' => '#4a4a4a',
        'border' => '#606060',
        'danger' => '#ff7e60',
        'footertext' => '#979797',
        'footerbg' => '#242425',
      ),
    ),
  ),
  'css' => array('css/color-scheme.css'),
);
