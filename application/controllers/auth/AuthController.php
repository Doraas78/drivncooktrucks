<?php

class AuthController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $load = new Loader();
        $load->service('AuthService');
    }

    public function signInAction()
    {

        if (isset($_POST['email'])) {

            $data = form_null_to_NULL_key_value($_POST);

            $addressModel = new AddressModel();
            $address = $addressModel->insertAddress($data);

            if ($address === -1)
                echo json_encode(-1); // server error

            if($data['newsletter'] == 'true')
                $data['newsletter'] = 1;
            else
                $data['newsletter'] = 0;

            $data['id_address'] = $addressModel->getLastAddress();

            // inscription of the new customer
            $auth_service = new AuthService();
            $user = $auth_service->inscription($data);

            if ($user !== true) {
                if ($user === 0)
                    echo json_encode(0); // customer already exist

                if ($user === -1)
                    echo json_encode(-1); // server error

            } else {

                $customer = new CustomerModel();
                $customer = $customer->find('email', $data['email']);

                $_SESSION['customer'] = $customer;
                $_SESSION['last_login_timestamp'] = time();

            }
        }
    }

    public function connectionAction()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {

            $auth_service = new AuthService();
            $user = $auth_service->connection(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));

            if($user === null) {
                echo json_encode(0);
            }else{
                /* IF ALL GOOD */

                $_SESSION['customer'] = $user;
                $_SESSION['last_login_timestamp'] = time();
            }
        } else {
            http_response_code(400);
        }
    }

    public function forgetPasswordAction()
    {
        if(isset($_POST['email'])){

            $auth_service = new AuthService();
            $check = $auth_service->resetPassword(htmlspecialchars($_POST['email']));

            if($check === null) // user don't exist
                echo json_encode('null');

            else if($check === false) // database failed
                echo json_encode('false');

            else if($check === true) // password has been changed
                echo json_encode('true');

        }
    }

    public function logoutAction()
    {
        session_destroy();
        redirect('home', 'Home', 'index');
    }

}

