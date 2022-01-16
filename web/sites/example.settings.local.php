<?php

// phpcs:ignoreFile

/**
 * @file
 * Local development override configuration feature.
 */

// Database credentials.
$databases['default']['default'] = [
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
  'host' => getenv('DB_HOSTNAME') ?? 'localhost',
  'port' => getenv('DB_PORT') ?? '3306',
  'database' => getenv('DB_DATABASE') ?? '',
  'prefix' => getenv('DB_PREFIX') ?? '',
  'username' => getenv('DB_USER') ?? '',
  'password' => getenv('DB_PASSWORD') ?? '',
];

// Environments.
$env = getenv('ENVIRONMENT') ?? 'local';

if ($env == 'local') {
  // Dev environment.
  assert_options(ASSERT_ACTIVE, TRUE);
  \Drupal\Component\Assertion\Handle::register();

  $settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';

  $config['system.logging']['error_level'] = 'verbose';
  $config['system.performance']['css']['preprocess'] = FALSE;
  $config['system.performance']['js']['preprocess'] = FALSE;

  $settings['cache']['bins']['render'] = 'cache.backend.null';
  $settings['cache']['bins']['discovery_migration'] = 'cache.backend.memory';
  $settings['cache']['bins']['page'] = 'cache.backend.null';
  $settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

# $settings['extension_discovery_scan_tests'] = TRUE;

  $settings['rebuild_access'] = TRUE;

  $settings['skip_permissions_hardening'] = TRUE;

  $settings['config_exclude_modules'] = ['devel', 'stage_file_proxy'];

  $settings['hash_salt'] = '1234567890';
}

// OpenSea.io API key (temporary).
// To be deleted when we'll create a dedicated `opensea` module.
$settings['opensea_api_key'] = getenv('opensea_api_key');
