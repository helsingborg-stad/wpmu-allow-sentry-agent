# WPMU Allow Sentry Agent

A WordPress must-use plugin that configures the Sentry PHP SDK to send events through a local Sentry Agent.

## Requirements

- PHP 7.4 or later
- Sentry PHP SDK `^4.34`
- A Sentry Agent listening on `127.0.0.1`

## Installation

Install the package with Composer:

```sh
composer require helsingborg-stad/wpmu-allow-sentry-agent
```

Composer installs this package in its own directory under `wp-content/mu-plugins`. WordPress only automatically loads PHP files directly in that directory, so add a loader at `wp-content/mu-plugins/wpmu-allow-sentry-agent.php`:

```php
<?php

require_once __DIR__ . '/wpmu-allow-sentry-agent/wpmu-allow-sentry-agent.php';
```

Ensure the site's Composer autoloader (including the Sentry SDK) is loaded before the package file.

## Usage

Add this to `wp-config.php` so the Sentry integration uses the package callback:

```php
define( 'WP_SENTRY_CLIENTBUILDER_CALLBACK', 'wp_sentry_clientbuilder_callback' );
```

The callback configures the Sentry client's HTTP client to use the local Sentry Agent.

The agent host is `127.0.0.1` and the default port is `5148`. To use another port, define `WP_SENTRY_AGENT_PORT` before the Sentry client is configured:

```php
define('WP_SENTRY_AGENT_PORT', 9000);
```

The Sentry Agent client uses the SDK's regular HTTP client as a fallback if the agent is unavailable.

