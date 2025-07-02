Dear <?php echo esc_html( $quote_data['customer_name'] ); ?>,

Thank you for your quote request. Here's our response:

Quote ID: [#<?php echo esc_html( $quote_data['quote_id'] ); ?>]

Vendor Reply:
<?php echo esc_html( $quote_data['message'] ); ?>


If you have any questions, feel free to reply.