<?php
/**
 * Plugin Name: IP Redirect
 * Description: Redirect users whose IP address starts with 77.29.
 * Version: 1.0
 * Author: Muhammad Qasim
 */

add_action('init', 'redirect_ip_addresses');

function redirect_ip_addresses() {
    $user_ip = $_SERVER['REMOTE_ADDR'];
    if (strpos($user_ip, '77.29') === 0) {
        wp_redirect('http://localhost:8080/Web%20Test/'); // 
        exit;
    }
}
?>
