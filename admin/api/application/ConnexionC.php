<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$rawBody = file_get_contents('php://input');
 $response = "";
 if(isset($_GET)) {
   require_once __DIR__.'/../../application/models/EmployeeModel.php';
    switch($_GET['action']){
        case 'login':
        if(isValid(array('action','email','pwd'))) {
            // $password = password_hash($_GET['pwd'], PASSWORD_DEFAULT);
            $employee = new EmployeeModel();
            $check    = $employee->getEmployeeByKey("email", $_GET['email']);

            if ( $check && password_verify($_GET["pwd"], $check[0]["password"]) ) {
              $response = 'User registered successfully';
            } else {
              $response = 'Informations incorrectes';
            }
        break;
      }
    }
 }

 function isValid($params){
    foreach($params as $param) {
        //if the paramter is not available or empty
        if(isset($_GET[$param])) {
            if(empty($_GET[$param])){
                return false;
            }
        } else {
            return false;
        }
    }
    //return true if every param is available and not empty
    return true;
}
echo $response;
?>
