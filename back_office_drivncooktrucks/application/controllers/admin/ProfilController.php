<?php

class ProfilController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $load = new Loader();
        $load->service('AuthService');
    }

    public function indexAction()
    {
        $this->data['cities'] = $this->getAllCity();
        $this->render('admin.profil', 'template_admin',$this->data );
    }

    public function changePasswordAction(){

        /* if password well sent */
        if(isset($_POST['password']))
        {

            $auth_service = new AuthService();
            $checkPassword = $auth_service->correctPassword($_POST['password'], $_SESSION['user']);

            /* if initial password not correct */
            if($checkPassword === false)
            {
                echo json_encode(false);
            }/* if initial password correct */
            else{
                $passwordHashed = hash('sha256', $_POST['new_password']);

                $data = array(
                    'new_password' => $passwordHashed,
                    'email' => $_SESSION['user']['email'],
                );

                $employeeModel = new EmployeeModel();
                $update = $employeeModel->updateEmployeePassword($data);
                echo json_encode($update);
            }
        }
    }

    public function updateEmployeeFewInfosAction()
    {
//        var_dump($_POST);

        if(isset($_POST) && !empty($_POST)){

            $data = array(
                'type_of_road' => $_POST['type_of_road'],
                'street' => $_POST['street'],
                'number' => (int)$_POST['number'],
                'city' => (int)$_POST['city'],
                'id_address' => (int)$_POST['id_address']
            );

            $employeeModel = new EmployeeModel();
            $data = $employeeModel->changeAddressEmployee($data);

            if($data === false)
                echo json_encode(0);
            else if($data === true){
                $data = array(
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'email' => $_POST['email'],
                    'phone' => $_POST['phone'],
                    'city' => (int)$_POST['city'],
                    'id' => $_SESSION['user']['id']
                );

                $user = new EmployeeModel();
                $check = $user->updateEmployeeAdminFewInfos($data);

                if($data === true)
                    echo json_encode(1);
                else if($data === false)
                    echo json_encode(0);

            }
        }
    }

    public function updateDataUserAction(){

        $_POST['password'] = hash('sha256', $_POST['password']);
        if(empty($_POST['phone'])){
            $_POST['phone'] = null;
        }
        $user = new EmployeeModel();
        $user->updateEmployee($_POST);

       $_SESSION['user'] = $user->getEmployeeByID($_POST['id']);

    }

    public function getAllCity()
    {
        $cityModel = new CityModel();
        return $cityModel->getCities();
    }

}

