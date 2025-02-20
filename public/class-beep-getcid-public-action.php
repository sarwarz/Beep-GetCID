<?php
defined( 'ABSPATH' ) || exit();

/**
 * Bc_GetCID_Public_Action Class
 */
class Bc_GetCID_Public_Action {

    public static function init() {
        add_action('wp_ajax_bc_get_confirmation_id', array( __CLASS__, 'handle_bc_get_confirmation_id') );
        add_action('wp_ajax_nopriv_bc_get_confirmation_id', array( __CLASS__, 'handle_bc_get_confirmation_id') );
    }

    public static function handle_bc_get_confirmation_id() {
        // Check nonce for security
        if ( !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'bc_get_cid_nonce_action') ) {
            wp_send_json_error(array('error_message' => 'Invalid nonce.'));
        }

        // Validate and sanitize the inputs
        $order_id = isset($_POST['order_id']) ? sanitize_text_field($_POST['order_id']) : '';
        $installation_id = isset($_POST['installation_id']) ? sanitize_text_field($_POST['installation_id']) : '';


        if (empty($order_id) || empty($installation_id)) {
            wp_send_json_error(array('error_message' => 'Order ID and Installation ID are required.'));
        }

        if (strlen($installation_id) !== 63) {
            wp_send_json_error(['error_message' => 'Installation ID must be exactly 63 characters.']);
        }

        // Check if the order exists and contains the specific product ID
        $order = wc_get_order($order_id);
        
        if (!$order) {
            wp_send_json_error(array('error_message' => 'Order not found.'));
        }

        // Check if the order status is "completed"
        if ('completed' !== $order->get_status()) {
            wp_send_json_error(array('error_message' => 'Order is not complete.'));
        }

        // Get accepted product IDs from settings
        $product_ids_to_check = get_option('bc_products_id', array());

        if (empty($product_ids_to_check)) {
            wp_send_json_error(['error_message' => 'No product ID is set for verification.']);
        }

         // Check if the order contains the allowed product IDs and get the total quantity
        $total_product_quantity = 0;
        foreach ($order->get_items() as $item) {
            if (in_array($item->get_product_id(), $product_ids_to_check)) {
                $total_product_quantity += (int) $item->get_quantity();
            }
        }

        if ($total_product_quantity === 0) {
            wp_send_json_error(['error_message' => 'Order does not contain the required phone activation product.']);
        }

        // Get the API execution count for this order
        $executed_count = (int) get_post_meta($order_id, '_bc_api_execution_count', true);
        
        // Check if the API call exceeds the product quantity
        if ($executed_count >= $total_product_quantity) {
            wp_send_json_error(['error_message' => 'You have reached the maximum limit of Confirmation ID requests for this order.']);
        }

        

        // Call the API if the order is valid and contains the required product
        $api_key = get_option('bc_api_key');
        $api_url = "https://pidkey.com/ajax/cidms_api?iids={$installation_id}&justforcheck=0&apikey={$api_key}";

        $response = wp_remote_get($api_url);

        if (is_wp_error($response)) {
            wp_send_json_error(array('error_message' => 'Failed to connect to API.'));
        }

        // Decode the response
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (isset($data['confirmationid'])) {

            // Update execution count
            update_post_meta($order_id, '_bc_api_execution_count', $executed_count + 1);
            $update_executed_count = (int) get_post_meta($order_id, '_bc_api_execution_count', true);
            $remaining_execution = $total_product_quantity - $update_executed_count;
            wp_send_json_success(array(
                'short_result'        => $data['short_result'],
                'confirmation_id'     => $data['confirmationid'],
                'remaining_execution' => $remaining_execution 
            ));

        } else {
            wp_send_json_error(array('error_message' => 'No confirmation ID found.'));
        }
    }
}

Bc_GetCID_Public_Action::init();
