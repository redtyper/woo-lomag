<?php

/**
 * Plugin Name: Woocommerce Integracja Lomag
 * Plugin URI: https://itdevweb.pl
 * Description: Woocommerce Integracja Lomag
 * Author:  ITDevWeb
 * Author URI: https://itdevweb.pl
 * Version: 1.0
 */
if (!class_exists('WC_Woo_Lomag')) :
  class WC_Woo_Lomag
  {
    /**
     * Construct the plugin.
     */
    public function __construct()
    {
      add_action('plugins_loaded', array($this, 'init'));
    }
    /**
     * Initialize the plugin.
     */
    public function init()
    {
      // Checks if WooCommerce is installed.
      if (class_exists('WC_Integration')) {
        // Include our integration class.
        include_once 'class-wc-integration-woo-lomag.php';
        // Register the integration.
        add_filter('woocommerce_integrations', array($this, 'add_integration'));
      }
    }
    /**
     * Add a new integration to WooCommerce.
     */
    public function add_integration($integrations)
    {
      $integrations[] = 'WC_Woo_Lomag_Integration';
      return $integrations;
    }
  }
  $WC_Woo_Lomag = new WC_Woo_Lomag(__FILE__);
endif;

// Set the plugin slug
define('woo_lomag', 'wc-settings');

// Setting action for plugin
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'WC_woo_lomag_action_links');

function WC_woo_lomag_action_links($links)
{

  $links[] = '<a href="' . menu_page_url(woo_lomag, false) . '&tab=integration">Ustawienia</a>';
  return $links;
}


add_action('woocommerce_order_status_completed', 'woo_lomag_order');
function woo_lomag_order($order_id)
{
  // Get an instance of the WC_Order object
  $order = wc_get_order($order_id);
  // Here are the correct way to get some values:
  $customer_id           = $order->customer_user;
  $billing_email         = $order->billing_email;
  $billing_first_name    = $order->billing_first_name;
  $billing_last_name     = $order->billing_last_name;
  $complete_billing_name = $billing_first_name . '' . $billing_last_name;
  $billing_address       = $order->billing_address_1;
  $billing_address2      = $order->billing_address_2;
  $billing_postcode      = $order->billing_postcode;
  $billing_state         = $order->billing_state;
  $billing_country       = $order->billing_country;
  $billing_phone         = $order->billing_phone;
  $order_status          = $order->status;
  // Dane użytkownika
  $user_data             = get_userdata($customer_id);
  $customer_login_name   = $user_data->user_login;
  $customer_login_email  = $user_data->user_email;
  $password              = $user_data->user_pass;
  $user_id               = $user_data->ID;
  // Iterating through each WC_Order_Item_Product objects
  foreach ($order->get_items() as $item_key => $item) :

    ## Using WC_Order_Item methods ##

    // Item ID is directly accessible from the $item_key in the foreach loop or
    $item_id = $item->get_id();

    ## Using WC_Order_Item_Product methods ##

    $product      = $item->get_product(); // Get the WC_Product object

    $product_id   = $item->get_product_id(); // the Product id
    $variation_id = $item->get_variation_id(); // the Variation id

    $item_type    = $item->get_type(); // Type of the order item ("line_item")

    $item_name    = $item->get_name(); // Name of the product
    $quantity     = $item->get_quantity();
    $tax_class    = $item->get_tax_class();
    $line_subtotal     = $item->get_subtotal(); // Line subtotal (non discounted)
    $line_subtotal_tax = $item->get_subtotal_tax(); // Line subtotal tax (non discounted)
    $line_total        = $item->get_total(); // Line total (discounted)
    $line_total_tax    = $item->get_total_tax(); // Line total tax (discounted)

    ## Access Order Items data properties (in an array of values) ##
    $item_data    = $item->get_data();

    $product_name = $item_data['name'];
    $product_id   = $item_data['product_id'];
    $variation_id = $item_data['variation_id'];
    $quantity     = $item_data['quantity'];
    $tax_class    = $item_data['tax_class'];
    $line_subtotal     = $item_data['subtotal'];
    $line_subtotal_tax = $item_data['subtotal_tax'];
    $line_total        = $item_data['total'];
    $line_total_tax    = $item_data['total_tax'];

    // Get data from The WC_product object using methods (examples)
    $product        = $item->get_product(); // Get the WC_Product object

    $product_type   = $product->get_type();
    $product_sku    = $product->get_sku();
    $product_price  = $product->get_price();
    $stock_quantity = $product->get_stock_quantity();

  endforeach;

  $isoDate = date("Y-m-d H:i:s");
  $ModDate = date("d-m-Y H:i:s");


//Inincjalizacja połączenia
  $conn = new PDO("dblib:host=185.36.168.79:21433;dbname=greenmonkey", "greenmonkey", 'Gre1en=Mon-key2');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  try {
    //Wstawianie nowego kontrahenta 
    //TODO
    //Przed wstawieniem sprawdzić, czy istnieje już taki, jeżeli tak pobrać jego IDKontrahenta
    $query = "INSERT INTO  dbo.Kontrahent (Nazwa,Odbiorca,Dostawca,NIP,Regon,Uwagi,KodPocztowy,Miejscowosc,UlicaLokal,AdresWWW,Email,Utworzono,Zmodyfikowano,Telefon,Fax,OsobaKontaktowa,Pracownik,IDKraju,NrKonta,SWIFT,NazwaBanku,IDPaymentType,Archiwalny,IDRodzajuTransportu,SupplyCity,UlicaDostawy,KodPocztowyDostawy,NazwaAdresuDostawy,OsobaKontaktowaDostawy,TelefonDostawy,IDPlatnikaVat,CzyFirma,CzyGlownaFirma,NazwaKonta,LimitKredytu,IDPriceList) VALUES ('$complete_billing_name',1,0,'','','','$billing_postcode','$billing_state','$billing_address','','$billing_email','$isoDate','$ModDate',$billing_phone,'',NULL,0,616,'','','',NULL,0,NULL,'','','','','','',NULL,NULL,NULL,NULL,NULL,NULL)";

    $result = $conn->query($query);
    unset($result);
  } catch (Exception $e) {
    die(print_r($e->getMessage()));
  }
  try {
    //Pobranie IDKontrahenta z tabeli Kontrahemt dla Kontrahenta z aktualnego zamówienia
    $query =  "SELECT IDKontrahenta FROM dbo.Kontrahent WHERE Nazwa LIKE '$complete_billing_name'";
    $idkontrahenta = $conn->query($query);
    return $idkontrahenta->fetch(PDO::FETCH_ASSOC);
    //print_r($idkontrahenta);
    unset($query);
  } catch (Exception $e) {
    die(print_r($e->getMessage()));
  }

  try {
    //     Wstawiając dane do Order:
    // IDOrder (nadawany automatycznie)
    // Ustawiamy OrderTypeID = 15  dla zamówień od klientów  (14 zamówienia od dostawców, 16 to oferty)
    // IDAccount - to ID klienta z tabeli Kontrahent
    // Number - to numer dokumentu np. numer zamówienia z presta
    // IDOrderStatus - to aktualny status zamówienia z tabli OrderStatus  (np. Otwarty lub można dodać własne..)
    // IDPaymentType - to sposób płatności za zamówienie (z tabeli PaymentTypes)
    // Remarks - Uwagi do zamówienia
    // IDUser -  jaki użytkownik tworzy ten wpis np. 1 = Admin  (tabela Uzytkownicy)
    // IDWarehouse - w jakim magazynie utworzyć zamówienie  (ID z tabeli Magazyn)
    // IDCurrency  = 1 dla PLN
    // IDCompany = 1
    $query = "INSERT INTO dbo.Orders (IDOrderType, IDAccount, Number, IDOrderStatus, IDPaymentType, Remarks, IDUser, IDWarehouse, IDCurrency, IDCompany) VALUES (15,'$idkontrahenta',$order_id,2,1,'',1,10,1,1)";
    $result = $conn->query($query);
    unset($query);
  } catch (Exception $e) {
    die(print_r($e->getMessage()));
  } 
  try {
    $query = "SELECT IDENT_CURRENT('dbo.Orders')";
    $idorder = $conn->query($query);
    return $idorder->fetch(PDO::FETCH_ASSOC);
    print_r($idorder);
    unset($query);
  } catch (Exception $e) {
    die(print_r($e->getMessage()));
  }
  try {
    //Szukanie produktu po SKU i wyiągnięcie jego IDTowaru
    $query = "SELECT IDTowaru FROM dbo.Towar WHERE KodKreskowy LIKE '$product_sku'";
    $iditem = $conn->query($query);
    return  $iditem->fetch(PDO::FETCH_ASSOC);
    print_r($iditem);
    unset($query);
  } catch (Exception $e) {
    die(print_r($e->getMessage()));
  }
  try {
    // Wstawiając do OrderLines:
    // IDOrderLine (nadawany automatycznie)
    // IDOrder - Id nagłówka zamówienia z tabeli Order
    // IDItem -ID towaru z tabeli Towar lub AktualnyStan
    // Quantity - Ilość towaru
    // PriceNet - cena netto
    // PriceGross - cena brutto z VAT
    // IDVat - ID stawki VAT z tabeli VATRates
    // Remarks - ewentualne dodatkowe uwagi
    // IDUser - jaki użytkownik tworzy ten wpis np. 1 = Admin (tabela Uzytkownicy)

    $query = "INSERT INTO dbo.OrderLines (IDOrder, IDItem, Quantity, PriceNet, PriceGross, IDVat, Remarks, IDUser) VALUES ($idorders, $iditem, '$quantity', NULL, '$product_price', '1', NULL, '1')";

    $result = $conn->query($query);
    unset($query);
  } catch (Exception $e) {
    die(print_r($e->getMessage()));
  }
}
