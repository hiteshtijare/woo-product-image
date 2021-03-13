<?php

/* Plugin Name: Woo Product Image
 * Plugin URI: 
 * Description: Assign Uploaded image to product using SKU.
 * Version: 1.0.0
 * Author: Hitesh
 * Author URI: 
 * Developer: Hitesh
 * Developer URI: 
 * Text Domain: woocommerce-extension
 * WC requires at least: 2.2
 * WC tested up to: 2.3
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

/* Check if WooCommerce is active */
if(in_array('woocommerce/woocommerce.php',apply_filters('active_plugins',get_option('active_plugins')))){


/*plugin activation method*/
function woo_product_image_activation() {
}
register_activation_hook(__FILE__, 'woo_product_image_activation');


/*plugin deactivation method*/
function woo_product_image_deactivation() {
}
register_deactivation_hook(__FILE__, 'woo_product_image_deactivation');

}
?>