<?php

/**
 * @file
 * Contains \Drupal\purge\Queue\UnexpectedServiceConditionException.
 */

namespace Drupal\purge\Queue;

/**
 * Exception thrown when the queue plugin is not acting in the way that was
 * expected to the QueueService. Usually when a item failed creation, etc.
 */
class UnexpectedServiceConditionException extends \Exception {}