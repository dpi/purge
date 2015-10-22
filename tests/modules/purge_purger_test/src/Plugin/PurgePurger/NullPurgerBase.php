<?php

/**
 * @file
 * Contains \Drupal\purge_purger_test\Plugin\PurgePurger\NullPurgerBase.
 */

namespace Drupal\purge_purger_test\Plugin\PurgePurger;

use Drupal\purge\Plugin\Purge\Purger\PurgerBase;
use Drupal\purge\Plugin\Purge\Purger\PurgerInterface;
use Drupal\purge\Plugin\Purge\Invalidation\PluginInterface as Invalidation;

/**
 * Ever failing null purger plugin base.
 */
abstract class NullPurgerBase extends PurgerBase implements PurgerInterface {

  /**
   * {@inheritdoc}
   */
  public function delete() {}

  /**
   * {@inheritdoc}
   */
  public function invalidate(Invalidation $invalidation) {
    $invalidation->setState(Invalidation::STATE_FAILED);
  }

  /**
   * {@inheritdoc}
   */
  public function invalidateMultiple(array $invalidations) {
    foreach ($invalidations as $invalidation) {
      $invalidation->setState(Invalidation::STATE_FAILED);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getIdealConditionsLimit() {
    return 100;
  }

  /**
   * {@inheritdoc}
   */
  public function getTimeHint() {
    return 1.0;
  }

}