<?php
session_start ();



use PayPal\Api\Payer;  //import paypal name space
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\payment;



require 'app/start.php';

if (!isset($_POST['title'], $_POST['price'])){
    die();
}
var_dump($_POST);

$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$shipping = 0;

$total = $price + $shipping;

//defining payer & payment method
$payer = new Payer(); 
$payer->setPaymentMethod('paypal');

//defining items in users basket
$item = new Item();
$item->setName($title)
    ->setCurrency('CAD')
    ->setQuantity(1)
    ->setPrice($price);
//set item list
$itemList = new ItemList();
$itemList->setItems([$item]);//if have multiple items in the cart you can do [$item, $item1, $item2]

//set item details
$details = new Details();
$details->setShipping($shipping)
    ->setSubtotal($price);

//set calculated amount
$amount = new Amount();
$amount->setCurrency('CAD')
    ->setTotal($total)
    ->setDetails($details);

//creating transaction by passing amount we just created into it
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription('PayForMembership Payment')//it could be anything
    ->setInvoiceNumber(uniqid()); //sets invoice number as unique id

//this is where users are returned if success or not
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL . '/pay.php?success=true')
    ->setCancelUrl(SITE_URL . '/pay.php?success=false');


$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions([$transaction]);//array of transactions

try {
    $payment->create($paypal);
}catch (Exception $e) {
    die($e);
}

 $approvalUrl = $payment->getApprovalLink();
header("Location: {$approvalUrl}");

    
