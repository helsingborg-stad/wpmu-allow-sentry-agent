<?php

/**
 * Plugin Name: WPMU Fatal Error When Enqueued Too Early
 * Description: Throws a descriptive exception when scripts or styles are registered or enqueued before the appropriate WordPress hook.
 * Version: 0.1.0
 * Author:      Helsingborgs stad
 */

namespace WPMUAllowSentryAgent;

use Sentry\Agent\Transport\AgentClientBuilder;
use Sentry\ClientBuilder;

function wp_sentry_clientbuilder_callback( ClientBuilder $builder ): void {
    $builder->setHttpClient(
        AgentClientBuilder::create()
            ->setHost('127.0.0.1')
            ->setPort(defined('WP_SENTRY_AGENT_PORT') ? constant('WP_SENTRY_AGENT_PORT') : 5148)
            ->getClient(),
    );
}