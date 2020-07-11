<?php

class AuthController extends Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $load = new Loader();
        $load->service('AuthService');
    }

    public function loginAction()
    {

        /* if login password and login well sent */
        if (isset($_POST['email']) && isset($_POST['password'])) {

            /* request connection */
            $auth_service = new AuthService();
            $user = $auth_service->connection(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));

            /* if user exist or login */
            if ($user !== null) {
                $_SESSION['user'] = $user;
                $_SESSION['last_login_timestamp'] = time();

                $_POST = array();

                if($_SESSION['user']['admin'])
                {
                    echo json_encode(1); // if login right and user is admin
                }else{
                    echo json_encode(2); // if login right and user is franchisee
                }
            }
            else /* if user does not exist or login */ {
                echo json_encode(0); // if login is wrong
            }
        }
        else {
            http_response_code(400);
        }
    }
    public function logoutAction()
    {
        $_POST = array();
        session_destroy();
        redirect('auth', 'Connection', 'index');
    }
}
