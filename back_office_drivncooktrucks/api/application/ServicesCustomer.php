<?php
require_once __DIR__.'/../../application/models/LoyaltyCardModel.php';
$json = $_POST;

 $response = array();
 if(isset($_GET['action'])) {
    switch($_GET['action']){
        case 'loyalty':
        if(isValid($json,array('email'))) {
            $email = $json['email'];
            $loyaltyCard  = new LoyaltyCardModel();
            $check = $loyaltyCard->getLoyaltyCardByKey("email_customer", $json['email']);
              if($check){
                $loyaltyCard = array(
                          'email_customer'  => $check[0]['email_customer'],
                          'activation_date' => $check[0]['activation_date'],
                          'expiration_date' => $check[0]['expiration_date'],
                          'number'          => $check[0]['number'],
                          'barcode'         => $check[0]['barcode'],
                          'points'          => $check[0]['points'],
                      );
                  //adding the card data in response
                  $response['error']   = false;
                  $response['message'] = 'Data recovered.';
                  $response['card']    = $loyaltyCard;
              } else {
                  $response['error'] = true;
                  $response['message'] = 'Loyalty card not found.';
              }
        } else {
            $response['error'] = true;
            $response['message'] = 'Incomplete data.';
        }
        break;
    }
 } else {
    $response['error']   = true;
    $response['message'] = 'Invalid Request.';

 }
//
 function isValid($json,$params){
    foreach($params as $param) {
        //if the paramter is not available or empty
        if(isset($json[$param])) {
            if(empty($json[$param])){
                return false;
            }
        } else {
            return false;
        }
    }
    //return true if every param is available and not empty
    return true;
}
echo json_encode($response);
?>
