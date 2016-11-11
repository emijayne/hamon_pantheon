<?php

/**
 * @file
 * Contains \Drupal\iframe\Plugin\Field\FieldWidget\IframeBaseWidget
 */

namespace Drupal\iframe\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation base functions.
 */
class IframeWidgetBase extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
      return array(
      'url' => '',
      'title' => '',
      'width' => '',
      'height' => '',
      'class' => '',
      'expose_class' => '',
      'frameborder' => 0,
      'scrolling' => '', # !! leave EMPTY string for recognition of first edit of manage-form-display !!
      'transparency' => 0,
      'tokensupport' => 0,
      // here if *own* default value not the one from edit-type-field
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   * used : at "Manage form display" after work-symbol
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    /* Settings form after "manage form display" page, valid for one content type */
    $field_settings = $this->getFieldSettings();
    $settings = $this->getSettings();
    $is_new = empty($settings['scrolling']);
    $values = array();
    #iframe_debug(3, 'manage settingsForm field_settings', $field_settings);
    #iframe_debug(3, 'manage settingsForm settings', $settings);

    foreach($settings as $vkey => $vval) {
        $values[$vkey] = $vval;
        if ($is_new && isset($field_settings[$vkey])) {
            $values[$vkey] = $field_settings[$vkey];
        }
    }

    $element['width'] = array(
      '#type' => 'textfield',
      '#title' => t('width of an iframe'),
      '#default_value' => $values['width'], # ''
      '#description' => t('iframes need fix width and height, only numbers are allowed.'),
      '#maxlength' => 4,
      '#size' => 4,
      '#required' => TRUE,
    );
    $element['height'] = array(
      '#type' => 'textfield',
      '#title' => t('height of an iframe'),
      '#default_value' => $values['height'], # ''
      '#description' => t('iframes need fix width and height, only numbers are allowed.'),
      '#maxlength' => 4,
      '#size' => 4,
      '#required' => TRUE,
    );
    $element['class'] = array(
      '#type' => 'textfield',
      '#title' => t('Additional CSS Class'),
      '#default_value' => $values['class'], # ''
      '#description' => t('When output, this iframe will have this class attribute. Multiple classes should be separated by spaces.'),
    );
    $element['expose_class'] = array(
      '#type' => 'checkbox',
      '#title' => t('Expose Additional CSS Class'),
      '#default_value' => $values['expose_class'], # 0
      '#description' => t('Allow author to specify an additional class attribute for this iframe.'),
    );
    $element['frameborder'] = array(
      '#type' => 'select',
      '#title' => t('Frameborder'),
      '#options' => array('0' => t('no frameborder'), '1' => t('show frameborder')),
      '#default_value' => $values['frameborder'], # 0
      '#description' => t('Frameborder is the border arround the iframe. Mostly people want it silent, so the default value for frameborder is 0 = no.'),
    );
    $element['scrolling'] = array(
      '#type' => 'select',
      '#title' => t('Scrolling'),
      '#options' => array('auto' => t('Scrolling automatic'), 'no' => t('Scrolling disabled'), 'yes' => t('Scrolling enabled')),
      '#default_value' => $values['scrolling'], # 'auto'
      '#description' => t('Scrollbars help the user to reach all iframe content despite the real height of the iframe content. Please disable it only if You know what You are doing.'),
    );
    $element['transparency'] = array(
      '#type' => 'select',
      '#title' => t('Transparency'),
      '#options' => array('0' => t('no transparency'), '1' => t('allow transparency')),
      '#default_value' => $values['transparency'], # 0
      '#description' => t('Allow transparency per CSS in the outer iframe tag. You have to set background-color:transparent in Your IFrame too for the body tag!'),
    );
    $element['tokensupport'] = array(
      '#type' => 'select',
      '#title' => t('Token Support'),
      '#options' => array('0' => t('no tokens allowed'), '1' => t('tokens only in title field'), '2' => t('tokens for title and url field')),
      '#default_value' => $values['tokensupport'], # 0
      '#description' => t('Are tokens allowed for users to use in title or url field?'),
    );
    if (! \Drupal::moduleHandler()->moduleExists('token')) {
      $element['tokensupport']['#description'] .= ' ' . t('Attention: token module is not enabled currently!');
    }
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    /* summary on the "manage display" page, valid for one content type */
    $summary = array();

    $summary[] = t('Iframe default width: @width', array('@width' => $this->getSetting('width')));
    $summary[] = t('Iframe default height: @height', array('@height' => $this->getSetting('height')));

    return $summary;
  }

  /**
   * {@inheritdoc}
   * used: (1) at admin edit fields
   * used: (2) at add-story for creation content
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    // Shows the "default fields" in the edit-type-field page, AND edit-fields on the article-edit-page
    /** @var \Drupal\iframe\Plugin\Field\FieldType\IframeItem $item */
    $item = $items[$delta];
    $field_settings = $this->getFieldSettings();
    $settings = $this->getSettings() + $field_settings;
    $on_admin_page = isset($element['#field_parents'][0]) && ('default_value_input' == $element['#field_parents'][0]);
    $entity = $items->getEntity();
    $is_new = $entity->isNew();
    #iframe_debug(3, 'add-story formElement field_setting', $field_settings);
    #iframe_debug(3, 'add-story formElement setting', $this->getSettings());
    #iframe_debug(3, 'add-story formElement setting', $settings);
    #iframe_debug(0, 'add-story formElement this', ($on_admin_page?"onAdmin":"noadmin")." ".($is_new?"isNEW":"nonew"));

    # pre fill with other attributes, (! last chance here !)
    if (!$on_admin_page && $is_new) {
        foreach(self::defaultSettings() as $dkey => $dval) {
            if (!preg_match('#^(title|url|width|height|class)$#', $dkey)) continue;
            $ddval = isset($item->{$dkey}) ? $item->{$dkey}
                : (isset($settings[$dkey]) ? $settings[$dkey] : NULL);
            $element[$dkey] = array(
                '#type' => 'value',
                '#value' => is_null($ddval) ? NULL : (string)$ddval,
            );
        }
    }

    $title = isset($item->title) ? $item->title
        : (!empty($settings['title']) ? $settings['title'] : '');
    $element['title'] = array(
      '#type' => 'textfield',
      '#title' => t('IFrame Title'),
      '#placeholder' => '',
      '#default_value' => $title,
      '#size' => 80,
      '#maxlength' => 1024,
      '#weight' => 2,
      //'#element_validate' => array('text'),
    );

    $url = (isset($item->url) && !empty($item->url)) ? $item->url
        : (!empty($settings['url']) ? $settings['url'] : '');
    $element['url'] = array(
      '#type' => 'textfield',
      '#title' => t('IFrame URL'),
      '#placeholder' => 'http://',
      '#default_value' => $url,
      '#size' => 80,
      '#maxlength' => 1024,
      '#weight' => 1,
      #'#element_validate' => array('iframe_validate_url'),
    );

    $width = (isset($item->width) && !empty($item->width)) ? $item->width
        : (isset($settings['width']) ? $settings['width'] : NULL);
    $element['width'] = array(
      '#title' => t('width of an iframe'),
      '#type' => 'textfield',
      '#default_value' => $width,
      '#description' => t('iframes need fix width and height, only numbers are allowed.'),
      '#maxlength' => 4,
      '#size' => 4,
      '#weight' => 3,
      '#required' => TRUE,
    );
    $height = (isset($item->height) && !empty($item->height)) ? $item->height
        : (isset($settings['height'])? $settings['height'] : NULL);
    $element['height'] = array(
      '#type' => 'textfield',
      '#title' => t('height of an iframe'),
      '#default_value' => $height,
      '#description' => t('iframes need fix width and height, only numbers are allowed.'),
      '#maxlength' => 4,
      '#size' => 4,
      '#weight' => 4,
      '#required' => TRUE,
    );
    if ($settings['expose_class']) {
      $element['class'] = array(
        '#type' => 'textfield',
        '#title' => t('Additional CSS Class'),
        '#default_value' => isset($item->class)? $item->class : NULL, # ''
        '#description' => t('When output, this iframe will have this class attribute. Multiple classes should be separated by spaces.'),
        '#weight' => 5,
      );
    }

    if ($on_admin_page) {
      #iframe_debug(0, 'formElement', $element);
      unset($element['url']);
      unset($element['height']['#required']);
      unset($element['width']['#required']);
    }
    return $element;
  } 

}

