<?php
/**
 * Integracja Lomag.
 *
 * @package   Woocommerce Integracja Lomag
 * @category Integracja
 * @author   ITDevWeb
 */
if ( ! class_exists( 'WC_Woo_Lomag_Integration' ) ) :
class WC_Woo_Lomag_Integration extends WC_Integration {
  /**
   * Init and hook in the integration.
   */
  public function __construct() {
    global $woocommerce;
    $this->id                 = 'woo-lomag-integration';
    $this->method_title       = __( 'WooCommerce Lomag');
    $this->method_description = __( 'Woocommerce Integracja Lomag');
    // Load the settings.
    $this->init_form_fields();
    $this->init_settings();
    // Define user set variables.
    $this->config_server          = $this->get_option( 'Konfiguracja Lomag' );
    // Actions.
    add_action( 'woocommerce_update_options_integration_' .  $this->id, array( $this, 'process_admin_options' ) );
  }
  /**
   * Initialize integration settings form fields.
   */
  public function init_form_fields() {
    $this->form_fields = array(
      'config_server' => array(
        'title'             => __( 'Konfiguracja Lomag'),
        'type'              => 'text',
        'description'       => __( 'Konfiguracja Lomag'),
        'desc_tip'          => true,
        'default'           => '',
        'css'      => 'width:170px;',
      ),
    );
  }
}
endif;  
