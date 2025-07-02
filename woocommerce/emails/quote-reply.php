<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p>Dear <?php echo esc_html( $quote_data['customer_name'] ); ?>,</p>
<p>Thank you for your quote request. Here's our response:</p>
<p><strong>Quote ID: #<?php echo esc_html( $quote_data['quote_id'] ); ?></strong></p>
<p><strong>Vendor Reply:</strong></p>
<p><?php echo wpautop( esc_html( $quote_data['message'] ) ); ?></p>
<p>If you have any questions, feel free to reply.</p>

<?php do_action( 'woocommerce_email_footer', $email ); ?>
