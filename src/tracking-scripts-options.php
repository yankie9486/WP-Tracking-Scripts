<?php

class Tracking_Scripts_Options
{
    private $options;

    public function __construct()
    {
        $this->options = get_option('wp_tracking_scripts');
    }

    public function get_option($key)
    {
        return $this->options[$key];
    }

    public function add_option($key, $value)
    {
        $this->options[$key] = $value;
    }

    public function save_options()
    {
        update_option('wp_tracking_scripts', $this->options);
    }

    public function is_options_empty()
    {
        return empty($this->options)? true : false;
    }
}
