<?php
/*
 * Plugin Name: PRyC WP/WooCommerce: Catalog Mode
 * Plugin URI: http://PRyC.eu
 * Description: For WooCommerce plugin - hide "add to cart" button and price (single product and product list/archive).
 * Author: PRyC
 * Author URI: http://PRyC.eu
 * Version: 1.1.6
 * Requires Plugins: woocommerce
 */
 



if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'pryc_wp_woocommerce_catalog_mode');

function pryc_wp_woocommerce_catalog_mode() {

/* --- add to cart - single --- */
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
/* --- price - single --- */
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	
/* price - list */
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );	
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
/* add to cart - list */
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );

}

function pryc_wp_woocommerce_catalog_mode_is_purchasable( $purchasable ){
    $purchasable = false;
    return $purchasable;
}
add_filter( 'woocommerce_is_purchasable', 'pryc_wp_woocommerce_catalog_mode_is_purchasable', 10, 1 );
	
