<?php

namespace Drupal\ffw_paragraphs\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class SettingsForm extends ConfigFormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ffw_marketo_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ffw_paragraphs.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ffw_paragraphs.settings');

    $form['base_url'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Url'),
      '#default_value' => $config->get('base_url'),
      '#required' => TRUE,
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $this->config('ffw_paragraphs.settings')
      ->set('base_url', $values['base_url'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
