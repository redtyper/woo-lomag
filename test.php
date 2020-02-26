<?php
try {
    //Wstawianie nowego kontrahenta 
    //TODO
    //Przed wstawieniem sprawdzić, czy istnieje już taki, jeżeli tak pobrać jego IDKontrahenta
     // Insert into Kontrahent
     $query = "
     INSERT INTO dbo.Kontrahent 
         (Nazwa, Odbiorca, Dostawca, NIP, Regon, Uwagi, KodPocztowy, Miejscowosc, UlicaLokal, AdresWWW, Email, Utworzono, Zmodyfikowano, Telefon, Fax, OsobaKontaktowa, Pracownik, IDKraju, NrKonta, SWIFT, NazwaBanku, IDPaymentType, Archiwalny, IDRodzajuTransportu, SupplyCity, UlicaDostawy, KodPocztowyDostawy, NazwaAdresuDostawy, OsobaKontaktowaDostawy,TelefonDostawy,  IDPlatnikaVat, CzyFirma, CzyGlownaFirma, NazwaKonta, LimitKredytu, IDPriceList) 
     VALUES 
         (?, 1, 0, '', '', '', ?, ?, ?, '', ?, ?, ?, ?, '', NULL, 0, 616, '', '', '', NULL, 0, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL)
     ";
 $stmt = $conn->prepare($query);
 $stmt->bindParam(1, $complete_billing_name, PDO::PARAM_STR);
 $stmt->bindParam(2, $billing_postcode, PDO::PARAM_STR);
 $stmt->bindParam(3, $billing_state, PDO::PARAM_STR);
 $stmt->bindParam(4, $billing_address, PDO::PARAM_STR);
 $stmt->bindParam(5, $billing_email, PDO::PARAM_STR);
 $stmt->bindParam(6, $isoDate, PDO::PARAM_STR);
 $stmt->bindParam(7, $ModDate, PDO::PARAM_STR);
 $stmt->bindParam(8, $billing_phone, PDO::PARAM_STR);
 if ($stmt->execute() === false) {
     die("Error executing query.");
 };
 $stmt = null;

  
  
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
   // Get ID       
   $query = "SELECT IDENT_CURRENT('dbo.Kontrahent') AS ID";
   $stmt = $conn->prepare($query);
   if ($stmt->execute() === false) {
       die("Error executing query.");
   };
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   $id = $result;
   //print_r($id);
   $stmt = null;

   // Insert into Orders
   $query = "
       INSERT INTO dbo.Orders 
           (IDOrderType, IDAccount, Number, IDOrderStatus, IDPaymentType, Remarks, IDUser, IDWarehouse, IDCurrency, IDCompany) 
       VALUES 
           (15, ?, ?, 2, 1, NULL, 1, 10, 1, 1)
   ";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(1, $id, PDO::PARAM_INT);
   $stmt->bindValue(2, $customer_id, PDO::PARAM_INT);  
   if ($stmt->execute() === false) {
       die("Error executing query.");
   };
var_dump($stmt);
   $stmt = null;

 
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
   // Get ID Order
   //$query = "SELECT TOP 1 IDOrder FROM dbo.Orders ORDER BY IDOrder DESC";
   $query ="SELECT IDENT_CURRENT('dbo.Orders') AS ID";
    $stmt = $conn->prepare($query);
    if ($stmt->execute() === false) {
        die("Error executing query.");
    };
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $idorder = $result;
    var_dump ($result);
    $stmt = null;


    // Get ID       
    $query = "SELECT IDTowaru FROM dbo.Towar WHERE KodKreskowy = '$product_sku' ";
    $stmt = $conn->prepare($query);
    if ($stmt->execute() === false) {
        die("Error executing query.");
    };
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $iditem = $result;
    var_dump($result);
    $stmt = null;
   
    $query = "
       INSERT INTO dbo.OrderLines
           (IDItem, IDOrder,Quantity, PriceNet, PriceGross, IDVat, Remarks, IDUser) 
       VALUES 
           (?, ?, ?, ?, ?, 1, 1, 1)
   ";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(1, $iditem, PDO::PARAM_INT);
   $stmt->bindParam(2, $idorder, PDO::PARAM_INT);
   $stmt->bindValue(3, $quantity, PDO::PARAM_INT);  
   $stmt->bindValue(4, $product_price, PDO::PARAM_INT); 
   $stmt->bindValue(5, $product_price, PDO::PARAM_INT); 
   if ($stmt->execute() === false) {
       die("Error executing query.");
   };
   var_dump($stmt);

   $stmt = null;
    
   
  } catch (Exception $e) {
    die(print_r($e->getMessage()));
  
