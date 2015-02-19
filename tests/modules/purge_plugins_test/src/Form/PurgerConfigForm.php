<?php

/**
 * @file
 * Contains \Drupal\purge_plugins_test\Form\PurgerConfigForm.
 */

namespace Drupal\purge_plugins_test\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\purge_ui\Form\PurgerConfigFormBase;

/**
 * @see \Drupal\purge_plugins_test\Plugin\PurgePurger\PurgerWithForm.
 */
class PurgerConfigForm extends PurgerConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'purge_plugins_test.purgerconfigform';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['textfield'] = [
      '#type' => 'textfield',
      '#title' => t('Test'),
      '#required' => FALSE,
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    return parent::submitForm($form, $form_state);
  }
}
