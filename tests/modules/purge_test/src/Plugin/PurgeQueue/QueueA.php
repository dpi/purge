<?php

/**
* @file
* Contains \Drupal\purge_test\Plugin\PurgeQueue\QueueA.
*/

namespace Drupal\purge_test\Plugin\PurgeQueue;

use Drupal\purge\Plugin\PurgeQueue\Memory;
use Drupal\purge\Queue\PluginInterface;

/**
* A \Drupal\purge\Queue\PluginInterface compliant memory queue for testing.
*
* @PurgeQueue(
*   id = "queue_a",
*   label = @Translation("Memqueue A"),
*   description = @Translation("A volatile and non-persistent memory queue"),
*   service_dependencies = {}
* )
*/
class QueueA extends Memory implements PluginInterface {}