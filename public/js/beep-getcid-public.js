(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	jQuery(document).ready(function($) {
	    $('#bc-form').on('submit', function(e) {
	        e.preventDefault();

	        var orderId = $('#order_id').val().trim();
	        var installationId = $('#installation_id').val().trim();
	        installationId = installationId.replace(/\s+/g, '');
	        installationId = installationId.replace(/[\s-]/g, '');

	        // Clear previous errors
	        $('.bc-input-error').remove();

	        // Validation: Check if fields are empty
	        if (!orderId || !installationId) {
	            if (!orderId) {
	                showError('#order_id', 'Order ID is required');
	            }
	            if (!installationId) {
	                showError('#installation_id', 'Installation ID is required');
	            }
	            return;
	        }

	        // Validation: Check if installation_id is exactly 63 characters
	        if (installationId.length !== 63) {
	            showError('#installation_id', 'Installation ID must be exactly 63 characters.');
	            return;
	        }

	        // Remove spaces from installation_id if any
	        

	        // Capture start time
	        var startTime = new Date().getTime();

	        // Send AJAX request
	        $.ajax({
	            type: 'POST',
	            url: bcGetCID.ajax_url,
	            data: {
	                action: 'bc_get_confirmation_id',
	                order_id: orderId,
	                installation_id: installationId,
	                nonce: $('#bc_get_cid_nonce').val()
	            },
	            beforeSend: function() {
	                $('.bc-api-response').text('Loading...')
	                    .removeClass('bc-success') // Remove success class if exists
	                    .removeClass('bc-error');  // Remove error class if exists
	            },
	            success: function(response) {
	                // Calculate time taken
	                var endTime = new Date().getTime();
	                var timeTaken = ((endTime - startTime) / 1000).toFixed(2); // Time in seconds (2 decimal places)

	                // Show the result and time taken
	                if (response.success) {
	                    $('.bc-api-response').text(response.data.short_result)
	                        .removeClass('bc-error')  // Remove error class if exists
	                        .addClass('bc-success');  // Add success class
	                    $('#bc_cid').val(response.data.confirmation_id);
	                    $('#remaining_exc').text(response.data.remaining_execution);

	                } else {
	                    $('.bc-api-response').text('Error: ' + response.data.error_message)
	                        .removeClass('bc-success') // Remove success class if exists
	                        .addClass('bc-error');    // Add error class
	                }

	                // Show time taken
	                 $('#bc_time').text('Time taken: ' + timeTaken + ' seconds');
	            },
	            error: function() {
	                // Calculate time taken in case of an error
	                var endTime = new Date().getTime();
	                var timeTaken = ((endTime - startTime) / 1000).toFixed(2); // Time in seconds (2 decimal places)

	                $('.bc-api-response').text('An error occurred. Please try again later.')
	                    .removeClass('bc-success') // Remove success class if exists
	                    .addClass('bc-error');    // Add error class
	                
	                // Show time taken
	                $('#bc_time').text('Time taken: ' + timeTaken + ' seconds');
	            }
	        });

	        // Function to show error message below the input
	        function showError(inputSelector, message) {
	            $(inputSelector).after(`<div class="bc-input-error" style="color:red; font-size:12px; margin-top:5px;">${message}</div>`);
	        }
	    });

	     // Handle Copy Button Click
	    $('#bc_copy_btn').on('click', function() {

	        var confirmationId = $('#bc_cid').val();

	        if (confirmationId) {
	            // Copy the text to the clipboard
	            navigator.clipboard.writeText(confirmationId).then(function() {
	                alert('Confirmation ID copied to clipboard!');
	            }).catch(function(err) {
	                console.error('Error copying text: ', err);
	                alert('Failed to copy confirmation ID.');
	            });
	        } else {
	            alert('No Confirmation ID to copy.');
	        }
	    });


	});



})( jQuery );


