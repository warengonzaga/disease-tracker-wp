<?php
/**
 * Plugin Name: WP Disease Tracker
 * Plugin URI: https://warengonzaga.com/wp-disease-tracker
 * Description: All-In-One Disease Tracker for WordPress
 * Version: 1.0
 * Author: Waren Gonzaga
 * Author URI: https://warengonzaga.com
 */

/**
 * COVID-19 Tracker
 */

// global tracker
function covid19_tracker_global($attr) {
    // covid-19 api
    $covid19_api = file_get_contents('https://disease.sh/v2/all?allowNull=true');
    // get the data from api
    $covid19_data = json_decode($covid19_api, true);
    // tracker default attributes
    shortcode_atts(
        array(
            'data' => 'cases'
        ), $attr
    );
    // finalize result and format the value
    $result = number_format($covid19_data[$attr['data']]);
    // show the resulting data
    return $result;
}

// wordpress hook
add_shortcode('covid19_global', 'covid19_tracker_global');
