<?php

/**
 * Plugin Name: WPMU Allow Sentry Agent
 * Description: Allows running a local Sentry agent
 * Version: 0.1.1
 * Author:      Helsingborgs stad
 */

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
