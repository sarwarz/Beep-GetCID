<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://beepcoder.com
 * @since      1.0.0
 *
 * @package    Bc_Admin_Display
 */

defined( 'ABSPATH' ) || exit();


class Bc_Admin_Setting_Display {

    public static function output(){
      ?>
        <div class="wrap">
            <h1 class="wp-heading-inline">
                <?php _e( 'Beep Get CID Settings', 'beep-getcid' ); ?>
            </h1>
            <hr class="wp-header-end">
            <div class="bc-setting-cobc">
                <div class="bc-settings-main">
                    <form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
                        <h3>API Settings</h3>
                        <div id="bc-description">
                            <p>The following options affect how api will work</p>
                        </div>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="bc_api_key">
                                        <?php esc_html_e( 'API KEY', 'beep-getcid' ); ?>
                                    </label>
                                </th>
                                <td>
                                    <?php
                                        $bc_api_key = '';
                                        if( get_option('bc_api_key') ){
                                            $bc_api_key = get_option('bc_api_key');
                                        }
                                    ?>
                                    <?php echo sprintf( '<input name="bc_api_key" id="bc_api_key" class="regular-text" type="text" value="%s">', $bc_api_key ); ?>
                                    <p class="description" id="home-description">Enter your API key to unlock access. Find your key <a target="_blank" href="https://khoatoantin.com/myaccount">here</a>.</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="bc_products_id">
                                        <?php esc_html_e('ACCEPTED PRODUCT ID', 'beep-getcid'); ?>
                                    </label>
                                </th>
                                <td>
                                    <?php
                                    $bc_products_id = get_option('bc_products_id', array());
                                    if (is_array($bc_products_id)) {
                                        $bc_products_id = implode(',', $bc_products_id);
                                    }
                                    ?>
                                    <input name="bc_products_id" id="bc_products_id" class="regular-text" type="text" value="<?php echo esc_attr($bc_products_id); ?>">
                                    <p class="description" id="home-description">Enter your Product ID(s) to obtain the confirmation ID for phone activation. Use a comma (,) to separate multiple product IDs.</p>
                                </td>
                            </tr>

                             
                            <tr>
                                <th scope="row">
                                    <h3>
                                        <?php esc_html_e( 'Design Settings', 'beep-getcid' ); ?>
                                    </h3>
                                </th>
                                <td></td>
                            </tr>
                             <tr>
                                <th scope="row">
                                    <label for="bc_primary_bg_color">
                                        <?php esc_html_e( 'Primary Background  Color', 'beep-getcid' ); ?>
                                    </label>
                                </th>
                                <td>
                                    <?php
                                        $bc_primary_bg_color = '';
                                        if( get_option('bc_primary_bg_color') ){
                                            $bc_primary_bg_color = get_option('bc_primary_bg_color');
                                        }
                                    ?>
                                    <?php echo sprintf( '<input name="bc_primary_bg_color" class="my-color-field" type="text" value="%s" data-default-color="#4CAF50" />', $bc_primary_bg_color ); ?>
                                </td>
                            </tr>
                             <tr>
                                <th scope="row">
                                    <label for="bc_panel_text_color">
                                        <?php esc_html_e( 'Primary Text Color', 'beep-getcid' ); ?>
                                    </label>
                                </th>
                                <td>
                                    <?php
                                        $bc_panel_text_color = '';
                                        if( get_option('bc_panel_text_color') ){
                                            $bc_panel_text_color = get_option('bc_panel_text_color');
                                        }
                                    ?>
                                    <?php echo sprintf( '<input name="bc_panel_text_color" class="my-color-field" type="text" value="%s" data-default-color="#fff" />', $bc_panel_text_color ); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="bc_panel_bg_color">
                                        <?php esc_html_e( 'Panel Background Color', 'beep-getcid' ); ?>
                                    </label>
                                </th>
                                <td>
                                    <?php
                                        $bc_panel_bg_color = '';
                                        if( get_option('bc_panel_bg_color') ){
                                            $bc_panel_bg_color = get_option('bc_panel_bg_color');
                                        }
                                    ?>
                                    <?php echo sprintf( '<input name="bc_panel_bg_color" class="my-color-field" type="text" value="%s" data-default-color="#fff" />', $bc_panel_bg_color ); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="bc_footer_bg_color">
                                        <?php esc_html_e( 'Footer Background Color', 'beep-getcid' ); ?>
                                    </label>
                                </th>
                                <td>
                                    <?php
                                        $bc_footer_bg_color = '';
                                        if( get_option('bc_footer_bg_color') ){
                                            $bc_footer_bg_color = get_option('bc_footer_bg_color');
                                        }
                                    ?>
                                    <?php echo sprintf( '<input name="bc_footer_bg_color" class="my-color-field" type="text" value="%s" data-default-color="#fff" />', $bc_footer_bg_color ); ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="bc_button_hover_color">
                                        <?php esc_html_e( 'Button Hover Color', 'beep-getcid' ); ?>
                                    </label>
                                </th>
                                <td>
                                    <?php
                                        $bc_button_hover_color = '';
                                        if( get_option('bc_button_hover_color') ){
                                            $bc_button_hover_color = get_option('bc_button_hover_color');
                                        }
                                    ?>
                                    <?php echo sprintf( '<input name="bc_button_hover_color" class="my-color-field" type="text" value="%s" data-default-color="#4CAF50" />', $bc_button_hover_color ); ?>
                                </td>
                            </tr>

                            <tr>
                
                                <td>
                                    <p class="submit">
                                        <input type="hidden" name="action" value="bc_save_settings">
                                        <?php wp_nonce_field( 'bc_settings_nonce' ); ?>
                                        <?php submit_button( __( 'Save Changes', 'beep-getcid' ) ); ?>
                                    </p>
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>  
        </div>
      <?php
  }

    
}

?>
