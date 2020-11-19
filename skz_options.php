<?php

function dbi_plugin_section_text() {
    echo '<p>Here you can set all the options for using the API</p>';
}

function dbi_plugin_setting_api_key() {
    $options = get_option( 'skz_option_group' );
    echo "<input id='dbi_plugin_setting_api_key' name='dbi_example_plugin_options[api_key]' type='text' value='{esc_attr( $options['api_key'] )}' />";
}

function dbi_plugin_setting_results_limit() {
    $options = get_option( 'skz_option_group' );
    echo "<input id='dbi_plugin_setting_results_limit' name='dbi_example_plugin_options[results_limit]' type='text' value='{esc_attr( $options['results_limit'] )}' />";
}

function dbi_plugin_setting_start_date() {
    $options = get_option( 'skz_option_group' );
    echo "<input id='dbi_plugin_setting_start_date' name='dbi_example_plugin_options[start_date]' type='text' value='{esc_attr( $options['start_date'] )}' />";
}
