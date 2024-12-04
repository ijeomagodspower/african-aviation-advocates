<?php

defined( 'ABSPATH' ) || die();

/**
 * Class Updater
 *
 * @package HT Mega \Elementor
 * @since 2.6.8
 */
class Updater {

    public static function init() {
        self::update();
    }

    protected static function update() {
        $previous_version= get_option( 'htmega_elementor_addons_version' );

        if ( $previous_version !== HTMEGA_VERSION ) {
            update_option( 'htmega_elementor_addons_previous_version', $previous_version );
            $assets_cache = new HTMega_Elementor_Assests_Cache();
            $assets_cache->delete_all();
        }

        update_option('htmega_elementor_addons_version', HTMEGA_VERSION );
        do_action('htmega_updated', HTMEGA_VERSION, $previous_version );
    }
}

Updater::init();
