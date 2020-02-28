<?php

namespace Drupal\Tests\purge\Unit\Logger;

use Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\purge\Logger\PurgeLoggerAwareTrait
 * @group purge
 */
class PurgeLoggerAwareTraitTest extends UnitTestCase {

  /**
   * The mocked logger.
   *
   * @var \PHPUnit_Framework_MockObject_MockObject|\Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    $this->logger = $this->createMock('\Psr\Log\LoggerInterface');
  }

  /**
   * @covers ::logger
   */
  public function testLogger() {
    $trait = $this->getMockForTrait('\Drupal\purge\Logger\PurgeLoggerAwareTrait');
    $trait->setLogger($this->logger);
    $this->assertEquals($this->logger, $trait->logger());
  }

  /**
   * @covers ::logger
   */
  public function testLoggerUnset() {
    $trait = $this->getMockForTrait('\Drupal\purge\Logger\PurgeLoggerAwareTrait');
    $this->expectException(\LogicException::class);
    $this->expectExceptionMessage('Logger unavailable, call ::setLogger().');
    $trait->logger();
  }

}
