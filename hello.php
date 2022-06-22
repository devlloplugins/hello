<?php
/*
Plugin Name: Hello World Plugin
Description: A test plugin that says Hello.
Version: 1.1
*/

require_once( 'wplit-license-manager.php' );


if ( is_admin() ) {
    $license_manager = new WP_License_It_Client(
        'hello',
        'Hello',
        'hello-text',
        '<YOUR-LICENSE-SITE-URL>/api/wplicense-it-api/v1', // ADD YOUR SITE URL TO THIS API URL
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
