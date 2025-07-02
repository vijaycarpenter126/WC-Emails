<?php

/** 
 * Filter WooCommerce email classes to add the custom Quote Reply email.
 * 
 * This filter loads the custom email class and registers it with WooCommerce,
 * so it can be triggered like built-in WooCommerce emails.
 *
 * @param array $emails Existing WooCommerce email classes.
 * @return array Modified email classes including WC_Email_Quote_Reply.
 */
add_filter( 'woocommerce_email_classes', function ( $emails ) {
    require_once get_stylesheet_directory() . '/lib/class-wc-email-quote-reply.php';
    $emails[ 'WC_Email_Quote_Reply' ] = new WC_Email_Quote_Reply();
    return $emails;
} );

/** 
 * Send the custom Quote Reply email to a customer.
 *
 * This function prepares the quote data and triggers the custom email.
 * Call this function when you want to send a quote reply to a customer.
 *
 * @param string $customer_email Recipient's email address.
 * @param string $customer_name  Recipient's name.
 * @param string $message        Vendor's reply message.
 * @param int    $quote_id       Quote identifier.
 */
function send_quote_email( $customer_email, $customer_name, $message, $quote_id ) {
    $mailer = WC()->mailer();
    $email  = $mailer->emails[ 'WC_Email_Quote_Reply' ];

    if ( $email ) {
        $quote_data = [ 
            'customer_name' => $customer_name,
            'message'       => $message,
            'quote_id'      => $quote_id,
        ];
        $email->trigger( $customer_email, $quote_data );
    }
}