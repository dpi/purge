<?php

/**
 * @file
 * Contains \Drupal\purge_plugins_test\Plugin\PurgeDiagnosticCheck\QueueSpecificWarningCheck.
 */

namespace Drupal\purge_plugins_test\Plugin\PurgeDiagnosticCheck;

use Drupal\purge\DiagnosticCheck\PluginInterface;
use Drupal\purge\DiagnosticCheck\PluginBase;

/**
 * Tests if there is a purger plugin that invalidates an external cache.
 *
 * @PurgeDiagnosticCheck(
 *   id = "queuewarning",
 *   title = @Translation("Queue specific warning"),
 *   description = @Translation("A fake test to test the diagnostics api."),
 *   dependent_queue_plugins = {"queue_b"},
 *   dependent_purger_plugins = {}
 * )
 */
class QueueSpecificWarningCheck extends PluginBase implements PluginInterface {

  /**
   * {@inheritdoc}
   */
  public function run() {
    $this->recommendation = "This is a queue warning for testing.";
    return SELF::SEVERITY_WARNING;
  }
}
