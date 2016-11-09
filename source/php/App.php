<?php

namespace openhours;

class App
{
    public function __construct()
    {
        add_action('admin_notices', array($this, 'sendRequirementsWarning'));
        add_shortcode('opening-hours', array($this, 'getTodaysOpeningHours'));
    }

    public function sendRequirementsWarning()
    {
        if (!function_exists('get_field')) {
            echo '<div class="notice notice-error">';
                echo '<p>';
                    _e("Open hours require ACF PRO to function. Please make shure that this is installed and enabled.", 'opening-hours-slug');
                echo '</p>';
            echo '</div>';
        }
    }

    public function getTodaysOpeningHours()
    {

        //Default data
        $unique_exception   = null;
        $exception_info     = get_field('oph_exeptions', 'option');

        //Get current day exception
        if (is_array($exception_info) && !empty($exception_info)) {
            foreach ($exception_info as $exception_data) {
                if ($exception_data['date'] == date("Y-m-d")) {
                    $unique_exception = $exception_data;
                    break;
                }
            }
        }

        //Get exception for this day
        if (!is_null($unique_exception) && is_array($unique_exception)) {
            $return_value = $unique_exception['ex_info'];
        } else {
            $return_value = get_field($this->getMetaKeyByDayId(date("w")), 'option');
        }

        return apply_filters('openhours/shortcode', $return_value);

    }

    public function getMetaKeyByDayId($day_id)
    {
        switch ($day_id) {
            case 1:
                return 'oph_mon';
                break;
            case 2:
                return 'oph_tue';
                break;
            case 3:
                return 'oph_wed';
                break;
            case 4:
                return 'oph_thu';
                break;
            case 5:
                return 'oph_fri';
                break;
            case 6:
                return 'oph_sat';
                break;
            case 0:
            case 7:
                return 'oph_sun';
                break;
            default:
                return false;
        }
    }
}
