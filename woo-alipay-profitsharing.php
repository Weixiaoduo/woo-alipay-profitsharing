<?php
/*
 * Plugin Name: Woo Alipay - Profit Sharing (分账/分润)
 * Plugin URI: https://woocn.com/
 * Description: 为 WooCommerce 订单提供支付宝分账/结算能力（延迟/即时）。需要先安装并启用 Woo Alipay 与 WooCommerce。
 * Version: 0.1.0
 * Author: WooCN.com
 * Author URI: https://woocn.com/
 * Requires Plugins: woocommerce, woo-alipay
 * Text Domain: woo-alipay-profitsharing
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

register_activation_hook( __FILE__, function() {
    // Ensure admin has capability to manage profit sharing.
    if ( function_exists( 'get_role' ) ) {
        $role = get_role( 'administrator' );
        if ( $role && ! $role->has_cap( 'manage_alipay_profitsharing' ) ) {
            $role->add_cap( 'manage_alipay_profitsharing', true );
        }
    }
} );

require_once plugin_dir_path( __FILE__ ) . 'bootstrap.php';
