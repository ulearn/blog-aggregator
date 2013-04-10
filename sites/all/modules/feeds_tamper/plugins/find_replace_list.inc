<?php
/**
 * @file
 * Find/replace array.
 */

$plugin = array(
  'form' => 'feeds_tamper_find_replace_list_form',
  'callback' => 'feeds_tamper_find_replace_list_callback',
  'validate' => 'feeds_tamper_find_replace_list_validate',
  'name' => 'Find replace by list',
  'multi' => 'loop',
  'category' => 'Text',
);

function feeds_tamper_find_replace_list_form($importer, $element_key, $settings) {
  $form = array();
  $form['find'] = array(
    '#type' => 'textarea',
    '#title' => t('List to find'),
    '#default_value' => isset($settings['find']) ? $settings['find'] : '',
    '#description' => t('Provide an list of the keys to target, enter one key per line.'),
  );
  $form['replace'] = array(
    '#type' => 'textarea',
    '#title' => t('List to replace'),
    '#default_value' => isset($settings['replace']) ? $settings['replace'] : '',
    '#description' => t('Provide an list of the values to replace, enter one key per line'),
  );
  $form['case_sensitive'] = array(
    '#type' => 'checkbox',
    '#title' => t('Case sensitive'),
    '#default_value' => isset($settings['case_sensitive']) ? $settings['case_sensitive'] : FALSE,
    '#description' => t('If checked, "book" will match "book" but not "Book" or "BOOK".'),
  );
  $form['whole'] = array(
    '#type' => 'checkbox',
    '#title' => t('Match whole word/phrase'),
    '#default_value' => isset($settings['whole']) ? $settings['whole'] : FALSE,
    '#description' => t('If checked, then the whole word or phrase will be matched, e.g. "book" will match not match "book" in "the book".<br />If this option is selected then "Respect word boundaries" above will be ignored.'),
  );
  $form['first'] = array(
    '#type' => 'checkbox',
    '#title' => t('Replace only once'),
    '#default_value' => isset($settings['first']) ? $settings['first'] : TRUE,
    '#description' => t('By default the replace will replace keys with values multiple times. This may not be desired, setting this only replaces the first matching key.'),
  );
  return $form;
}

function feeds_tamper_find_replace_list_validate(&$settings) {
  $settings['regex'] = FALSE;

  // save arrays
  $arr_find = explode("\n", $settings['find']);
  $arr_find = array_map('trim', $arr_find);
  $settings['keys'] = $arr_find;

  $arr_replace = explode("\n", $settings['replace']);
  $arr_replace = array_map('trim', $arr_replace);
  $settings['values'] = $arr_replace;

  if ($settings['case_sensitive'] && !$settings['whole'] && !$settings['first']) {
    $settings['func'] = 'str_replace';
  }
  elseif (!$settings['case_sensitive'] && !$settings['whole'] && !$settings['first']) {
    $settings['func'] = 'str_ireplace';
  }
  else {
    $settings['regex'] = TRUE;
    $settings['limit'] = -1;
    $regex_front = '';
    $regex_back = '';
    
    if ($settings['first']) {
        $settings['limit'] = 1;
    }

    if ($settings['whole']) {
      $regex_front = '/^';
      $regex_back = '$/';
    }

    if (!$settings['case_sensitive']) {
      $regex_back .= 'i';
    }

    $reg_string_fix = function($value) use ($regex_front, $regex_back) {
        return $regex_front . $value . $regex_back;
    };

    $settings['regex_find'] = array_map($reg_string_fix, $settings['keys']);
  }
}

function feeds_tamper_find_replace_list_callback($result, $item_key, $element_key, &$field, $settings) {
  if ($settings['regex']) {
    $field = preg_replace($settings['regex_find'], $settings['values'], $field, $settings['limit']);
  }
  else {
    $field = $settings['func']($settings['keys'], $settings['values'], $field);
  }
}