# WC-Emails

This repository provides a custom WooCommerce email for sending quote replies to customers.

## Features

- Adds a new WooCommerce email type: "Quote Reply"
- Sends an email to customers when a vendor replies to a quote request
- Supports both HTML and plain text email templates

## File Structure

```
class-wc-email-quote-reply.php      # Custom WooCommerce email class
functions.php                       # Hooks and helper to send the custom email
woocommerce/
  emails/
    quote-reply.php                 # HTML email template
    plain/
      quote-reply.php               # Plain text email template
```

## Installation

1. Copy the files into your theme or child theme directory.
2. Make sure the paths in `functions.php` and `class-wc-email-quote-reply.php` match your theme structure.

## Usage

To send a quote reply email, call the `send_quote_email` function:

```php
send_quote_email( $customer_email, $customer_name, $message, $quote_id );
```

- `$customer_email`: The recipient's email address.
- `$customer_name`: The recipient's name.
- `$message`: The vendor's reply message.
- `$quote_id`: The quote identifier.

## Customization

- Edit the templates in `woocommerce/emails/quote-reply.php` and `woocommerce/emails/plain/quote-reply.php` to change the email content.
- Modify `class-wc-email-quote-reply.php` to adjust email settings or behavior.

