<?php


class ProfilController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $load = new Loader();
        $load->service('AuthService');
        $this->data['active_profil'] = 1;
    }

    public function indexAction()
    {
        $this->render('user.profil', 'template_user', $this->data);
    }

    public function getActualCustomerAction(){
        $customerModel = new CustomerModel();
        return $customerModel->getCustomerFull($_SESSION['customer']['email']);
    }

    public function changePasswordAction(){

        /* if password well sent */
        if(isset($_POST['password']))
        {

            $customer = $this->getActualCustomerAction();


            /* if customer doesn't exist */
            if($customer === null)
            {
                echo json_encode(null);

            }/* if customer exist */
            else {


                $auth_service = new AuthService();
                $checkPassword = $auth_service->correctPassword($_POST['password'], $customer);

                /* if initial password not correct */
                if($checkPassword === false)
                {
                    echo json_encode(false);
                }/* if initial password correct */
                else{
                    $passwordHashed = hash('sha256', $_POST['new_password']);

                    $data = array(
                        'new_password' => $passwordHashed,
                        'email' => $customer['email'],
                    );

                    $customerModel = new CustomerModel();
                    $update = $customerModel->updateCustomerPassword($data);
                    echo json_encode($update);
                }
            }
        }
    }

    public function changeEmailAction(){

        /* if email well sent */
        if(isset($_POST['new_email']))
        {

            $auth_service = new AuthService();
            $checkEmail = $auth_service->emailExists($_POST['new_email']);

            /* if initial email correct */
            if($checkEmail === null)
            {
                $data = array(
                    'new_email' => $_POST['new_email'],
                    'email' => $_SESSION['customer']['email']
                );

                $customerModel = new CustomerModel();
                $update = $customerModel->updateCustomerEmail($data);

                $customer = $customerModel->getCustomerFull($_POST['new_email']);
                $_SESSION['customer'] = $customer;

                echo json_encode($update);
            }else
            {
                echo json_encode(0);
            }
        }
    }
}