<?php
/*
Plugin Name: Hello World Plugin
Description: A test plugin that says Hello.
Version: 1.0
*/

require_once( 'wplit-license-manager.php' );


if ( is_admin() ) {
    $license_manager = new WP_License_It_Client(
        'hello',
        'Hello',
        'hello-text',
        'https://test.devlloplugins.com/api/wp-license-it-api/v1', // CHANGE TO YOUR SITE URL
        'plugin',
        __FILE__,
    );
}

class Hello_World_Plugin {

    private static $_instance = null;
    public $_session = null;

    /**
     * Constructor
     */

    public function __construct(){
        include('settings.php');
    }

}

new Hello_World_Plugin;
