<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

var_dump('erreur');*/

$rawBody = file_get_contents('php://input');
$json = $_POST;

 $response = array();
 if(isset($_GET['action'])) {
   require_once __DIR__.'/../../application/models/CustomerModel.php';
    switch($_GET['action']){
        case 'signup':
        if(isValid($json,array('first_name','last_name','address','birthday_date','email','password','gender'))) {
            $password = password_hash($json['password'], PASSWORD_DEFAULT);
            $user  = new CustomerModel();
            $check = $user->getCustomerByKey("email", $json['email']);

            if(!$check) {
                 //if user is new creating an insert
                 $user  = new CustomerModel();
                 $json['password'] = $password;

                //if the user is successfully added to the database
                if($user->insertCustomer($json)){
                  $check  = $user->getCustomerByKey("email", $json['email']);
                  //if the user exist with given credentials
                  $user = array(
                            'email'        => $check['email'],
                            'last_name'    => $check['last_name'],
                            'first_name'   => $check['first_name'],
                            'location'      => $check['location'],
                            'gender'       => $check['gender'],
                            'birthday_date'=> $check['birthday_date'],
                        );
                    // adding the user data in response
                    $response['error']   = false;
                    $response['message'] = 'User registered successfully.';
                    $response['user']    = $user;
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Unable to create user.';
                }
            } else {
                $response['error'] = true;
                $response['message'] = 'User already registered.';
            }
        } else {
            $response['error'] = true;
            $response['message'] = 'Incomplete data.';
        }
        break;
        case 'login':
        if(isValid($json,array('email', 'password'))){
            //getting values
            $password = password_hash($json['password'],PASSWORD_DEFAULT);

            //creating the check query
            $user  = new CustomerModel();
            $check = $user->getCustomerByKey("email", $json['email']);

            //if the user exist with given credentials
            $user = array(
                      'email'        => $check['email'],
                      'last_name'    => $check['last_name'],
                      'first_name'   => $check['first_name'],
                      'location'      => $check['location'],
                      'gender'       => $check['gender'],
                      'birthday_date'=> $check['birthday_date'],
                  );
            if(password_verify($json['password'], $check['password'])) {
                $response['error']   = false;
                $response['message'] = 'Login successfull';
                $response['user']    = $user;
            }else{
                //if the user not found
                $response['error']   = true;
                $response['message'] = 'Invalid email or password';
            }
        } else {
            $response['error'] = true;
            $response['message'] = 'Invalid data.';
        }
        break;
        default;
            $response['error'] = true;
            $response['message'] = 'Invalid Action.';
        break;
    }
 } else {
    $response['error']   = true;
    $response['message'] = 'Invalid Request.';
 }

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
