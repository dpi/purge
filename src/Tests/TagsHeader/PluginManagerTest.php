<?php

namespace Drupal\purge\Tests\TagsHeader;

use Drupal\Component\Plugin\Discovery\CachedDiscoveryInterface;
use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\purge\Tests\KernelServiceTestBase;

/**
 * Tests \Drupal\purge\Plugin\Purge\TagsHeader\PluginManager.
 *
 * @group purge
 * @see \Drupal\Core\Plugin\DefaultPluginManager
 */
class PluginManagerTest extends KernelServiceTestBase {

  /**
   * The name of the service as defined in services.yml.
   *
   * @var string
   */
  protected $serviceId = 'plugin.manager.purge.tagsheader';

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['purge_tagsheader_test'];

  /**
   * All metadata from \Drupal\purge\Annotation\PurgeTagsHeader.
   *
   * @var string[]
   */
  protected $annotationFields = [
    'provider',
    'class',
    'id',
    'header_name',
    'dependent_purger_plugins',
  ];

  /**
   * All bundled plugins in purge core, including in the test module.
   *
   * @var string[]
   */
  protected $plugins = [
    'a',
    'b',
    'c',
  ];

  /**
   * Test if the plugin manager is built as we'd like.
   */
  public function testCodeContract() {
    $this->assertTrue($this->service instanceof PluginManagerInterface);
    $this->assertTrue($this->service instanceof DefaultPluginManager);
    $this->assertTrue($this->service instanceof CachedDiscoveryInterface);
  }

  /**
   * Test the plugins we expect to be available.
   */
  public function testDefinitions() {
    $definitions = $this->service->getDefinitions();
    foreach ($this->plugins as $plugin_id) {
      $this->assertTrue(isset($definitions[$plugin_id]));
    }
    foreach ($definitions as $plugin_id => $md) {
      $this->assertTrue(in_array($plugin_id, $this->plugins));
    }
    foreach ($definitions as $plugin_id => $md) {
      foreach ($md as $field => $value) {
        $this->assertTrue(in_array($field, $this->annotationFields));
      }
      foreach ($this->annotationFields as $field) {
        $this->assertTrue(isset($md[$field]));
      }
    }
  }

}
