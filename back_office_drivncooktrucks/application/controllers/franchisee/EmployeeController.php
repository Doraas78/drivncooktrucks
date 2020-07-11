<?php


class EmployeeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $load = new Loader();
        $load->service('AuthService');
    }

    function updateEmployeeInfos()
    {
        $employeeModel = new EmployeeModel();
        $employee = new EmployeeModel();
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

    public function changeEmailAction(){

        $auth_service = new AuthService();
        $checkEmail = $auth_service->emailExists($_POST['new_email']);

        /* if initial password correct */
        if($checkEmail !== false)
        {
            $data = array(
                'new_email' => $_POST['new_email'],
                'email' => $_SESSION['user']['email'],
            );

            $employeeModel = new EmployeeModel();
            $update = $employeeModel->updateEmployeeEmail($data);

            $employeeModel = new EmployeeModel();
            $employee = $employeeModel->getFullEmployeeByID($_POST['new_email']);
            $_SESSION['user'] = $employee[0];

            echo json_encode($update);
        }
    }
}