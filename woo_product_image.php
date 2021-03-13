<?php
defined( 'ABSPATH' ) or die( 'Nope, not accessing this' );

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

/* Image upload page section*/
add_action('admin_menu', 'image_upload_page');

function image_upload_page(){
    add_submenu_page( 'woocommerce','Product Image & Gallery Upload', 'Product Image Upload', 'manage_options', 'image-upload-page', 'image_upload_page_init' );
}

/*Add Media js and Media gallery */
function woo_plugin_admin_scripts() {
	wp_enqueue_media();
    wp_enqueue_script( 'plugin_script', plugins_url( '/js/pluginscript.js' , __FILE__ ), array('jquery'), '0.1' );
}

add_action('admin_print_scripts', 'woo_plugin_admin_scripts');

/*Plugin Image upload page*/
function image_upload_page_init(){
 echo "<h1>Upload Woocommerce Product Image</h1>";
 echo "<h4>Upload and Assign Product Image for Product SKU. </h4>";
 echo "<b>Image Upload Instructions:</b>

 <ul>
<li>* Upload image name with product sku like product sku is 12345.</li>
<li>* Main image name should be like 12345.jpg.</li>
<li>* Additional gallery product images name should be like 12345_1.jpg,
12345_2.jpg, 12345_3.jpg etc...</li>
 </ul>";
 
 echo '
 <input type="hidden" name="woo_plugin_image_id" id="woo_plugin_image_id" value=""  />
 <input type="button" class="button-primary" value="Upload/Select Images" id="woo_plugin_media_manager"/>
 ';
 }

}
?>