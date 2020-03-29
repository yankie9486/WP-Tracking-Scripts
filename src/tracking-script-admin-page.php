<?php

class Script_Tracking_Admin_Page
{
    public function __construct()
    {
        add_action('admin_menu', array(&$this,'add_menu_page'));
    }

    public function add_menu_page()
    {
        add_options_page(
            'Script Tracking',
            'Script Tracking',
            'manage_options',
            'script_tracking',
            array(&$this,'options_page')
        );
    }

    public function options_page()
    {
        if (!current_user_can('manage_options')) {
            wp_die('You do not have suggicient permissions to access this page.');
        }

        $ts_options = new Tracking_Scripts_Options();
        $google = '';
        $facebook = '';
        $inspectlet = '';

        if (isset($_POST['submit_form']) && isset($_POST['script_tracking_generate_nonce'])) {
            if (wp_verify_nonce($_POST['script_tracking_generate_nonce'], 'script_tracking_submit')) {
                $google = sanitize_text_field($_POST['google-analytics']);
                $facebook = sanitize_text_field($_POST['facebook']);
                $inspectlet = sanitize_text_field($_POST['inspectlet']);

                $ts_options->add_option('google_code', $google);
                $ts_options->add_option('facebook_code', $facebook);
                $ts_options->add_option('inspectlet_code', $inspectlet);
                $ts_options->save_options();
            } else {
                wp_die('No naughtly stuff.');
            }
        }

        $options = get_option('wp_script_tracking');

        if (!$ts_options->is_options_empty()) {
            $google = $ts_options->get_option('google_code');
            $facebook = $ts_options->get_option('facebook_code');
            $inspectlet = $ts_options->get_option('inspectlet_code');
        }

        include WPTS_DIR .'/templates/admin-tracking-script-page.php';
    }
}
