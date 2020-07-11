<?php

class AuthService {

    private $db;

    public function __construct()
    {
        $this->db = new Model('EMPLOYEE');
    }

    public function connection(string $email, string $password)
    {

        $user = $this->emailExists($email);
        if ($user === null || empty($user))
            return null;

//        $user = $user[0];

        if($this->correctPassword($password, $user) === false){
            return null;
        }

        return $user;
    }

    public function emailExists(string $email) {
        $employeeModel = new EmployeeModel();
        return $employeeModel->getFullEmployeeByEmail($email);
    }

    public function correctPassword(string $password, array $user) : bool {
        $passwordHashed = hash('sha256', $password);

        return $user['password'] == $passwordHashed;
    }

}
