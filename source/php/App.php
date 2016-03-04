<?php

namespace openhours;

class App
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueueStyles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueScripts'));

        add_action('admin_notices', array($this, 'sendRequirementsWarning'));
    }

    /**
     * Enqueue required style
     * @return void
     */
    public function enqueueStyles()
    {
    }

    /**
     * Enqueue required scripts
     * @return void
     */
    public function enqueueScripts()
    {
    }

    public function sendRequirementsWarning()
    {
        if (!function_exists('get_field')) {
            printf('<div class="notice notice-error"><p>%1$s</p></div>', __("Open hours require ACF PRO to function. Please make shure that this is installed and enabled.", 'opening-hours-slug'));
        }
    }
}
