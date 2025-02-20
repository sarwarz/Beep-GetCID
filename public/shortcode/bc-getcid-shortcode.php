<?php 
 function bc_get_confirmation_id_shortcode() {
    ob_start();
    ?>
    <section class="bc-section-wrapper">
        <div class="bc-box-wrapper" >
            <div class="bc-box">
                <div class="bc-box-header">
                    <h2 style="" class="bc-box-title">Get Confirmation ID</h2>
                </div>
                <div class="bc-box-body">
                    <form id="bc-form" method="POST">
                        <div class="bc-input-container">
                            <label for="order_id">Your Order ID:</label>
                            <input type="text" id="order_id" name="order_id" placeholder="Enter your order id">
                        </div>
                        <div class="bc-input-container">
                            <label for="installation_id">Your Installation ID:</label>
                            <input type="text" id="installation_id" name="installation_id" placeholder="Enter 9 groups of 7 numbers Installation id">
                        </div>
                        <div class="bc-submit">
                            <input class="bc-btn" type="submit" value="GET CID" name="bc_submit_btn">
                        </div>
                        <?php wp_nonce_field( 'bc_get_cid_nonce_action', 'bc_get_cid_nonce' ); ?>
                    </form>
                </div>
                <div class="bc-box-footer">
                    <h3 class="bc-output-text">GET CID Result:</h3>
                    <div class="bc-api-response">Waiting for response...</div>
                    <div class="bc-footer-output-box">
                        <h3 class="bc-output-text">Confirmation ID:</h3>
                        <div class="bc-input-area">
                            <input type="text" id="bc_cid" name="bc_cid" value="Waiting for response..." readonly>
                            <button id="bc_copy_btn">COPY</button>
                        </div>

                    </div>
                    <div class="bc-footer-info">
                        <span>Remaining Executions: <span id="remaining_exc">0</span></span>
                        <span id="bc_time">Time taken: 0.00 seconds</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('bc_get_confirmation_id', 'bc_get_confirmation_id_shortcode');
