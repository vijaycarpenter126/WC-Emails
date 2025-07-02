<?php 
if ( ! class_exists( 'WC_Email_Quote_Reply' ) ) {

	class WC_Email_Quote_Reply extends WC_Email {

		public function __construct() {
			$this->id             = 'quote_reply';
			$this->title          = 'Quote Reply';
			$this->description    = 'Email sent to customers when a vendor replies to a quote request.';
			$this->customer_email = true;

			$this->template_html  = 'emails/quote-reply.php';
			$this->template_plain = 'emails/plain/quote-reply.php';

			$this->template_base  = get_stylesheet_directory( ) . '/woocommerce/';

			// Triggers for this email
			add_action( 'send_quote_reply_email', [ $this, 'trigger' ], 10, 2 );

			parent::__construct();
		}

		public function trigger( $customer_email, $quote_data ) {
			if ( ! $customer_email ) {
				return;
			}

			$this->recipient = $customer_email;

			$this->quote_data = $quote_data;

			$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
		}

		public function get_content_html() {
			return wc_get_template_html(
				$this->template_html,
				[ 'email' => $this, 'quote_data' => $this->quote_data ],
				'', // No custom override directory
				$this->template_base
			);
		}

		public function get_content_plain() {
			return wc_get_template_html(
				$this->template_plain,
				[ 'email' => $this, 'quote_data' => $this->quote_data ],
				'',
				$this->template_base
			);
		}

		public function get_default_subject() {
			return 'Your Quote Reply from {site_title}';
		}

		public function get_default_heading() {
			return 'Quote Reply';
		}
	}
}