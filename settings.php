<?php

add_action( 'admin_menu', 'admin_menu' );
add_action( 'admin_init', 'init_settings');
add_action( 'admin_notices', 'license_admin_notice');


function init_settings() {
    register_setting( 'hello-settings-options', 'license-api-key' );
    register_setting( 'hello-settings-options', 'license-email' );
}


function admin_menu() {
    /**
     * menus
     * @var array
     */

    add_options_page(
        __( 'Hello Plugin', 'hello-text' ),
        'Hello Plugin',
        'manage_options',
        'hello_license_settings',
        'settings_page',
    );
}


function license_admin_notice() {
    $licenseapikey = get_option('license-api-key');
    $licenseemail = get_option('license-email');
    if ( !function_exists( 'get_current_screen' ) ) { 
        require_once ABSPATH . '/wp-admin/includes/screen.php'; 
     } 
     $my_current_screen = get_current_screen();

    if ( isset( $my_current_screen->base ) && 'settings_page_hello_license_settings' === $my_current_screen->base ) {

    if (!$licenseapikey || !$licenseemail){
        ?>
                    <div class="update-nag notice">
                        Please Enter Your License Key For Updates
                    </div>
        <?php
    }
}

}

function settings_page(){

    ?>
       	<form method="post" action="options.php">

           <?php
    settings_fields( 'hello-settings-options' );
    do_settings_sections( 'hello-settings-options' );

   _e('<h3>License Settings</h3>', '');

   $licenseapikey = get_option('license-api-key');
   $licenseemail = get_option('license-email');
   ?>

   License Key: <br/>
   <input name="license-api-key" type="text" class="regular-text" value="<?php if (isset($licenseapikey)) { echo esc_attr($licenseapikey); }?>"> <br/>
   License Email: <br />
   <input name="license-email" type="text" class="regular-text" value="<?php if (isset($licenseemail)) { echo esc_attr($licenseemail); }?>">

   <?php
submit_button(); ?> </form> <?php

}
