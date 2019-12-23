<?php
    
    if($_POST['tokenId']) {

      require_once('vendor/autoload.php');
    
      //stripe secret key or revoke key
      $stripeSecret = 'sk_test_j5k0976GOLSOtiRzbDLpKqat00og5iM3cY';

      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey($stripeSecret);

     // Get the payment token ID submitted by the form:
      $token = $_POST['tokenId'];

      // Charge the user's card:
      $charge = \Stripe\Charge::create(array(
          "amount" => $_POST['amount'],
          "currency" => "usd",
          "description" => "stripe integration in PHP with source code - tutsmake.com",
          "source" => $token,
       ));
            
       // after successfull payment, you can store payment related information into your database
             
        $data = array('success' => true, 'data'=> $charge);

        echo json_encode($data); 
}
