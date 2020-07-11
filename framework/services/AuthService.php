<?php

class AuthService {

    private $db;

    public function __construct()
    {
        $this->db = new Model('CUSTOMER');
    }

    public function connection(string $email, string $password)
    {

        $user = $this->emailExists($email);
        if ($user === null || empty($user))
            return null;

        if($this->correctPassword($password, $user) === false)
            return null;

        return $user;
    }

    public function inscription(array $params)
    {
        $user = $this->emailExists($params['email']);

        /* customer already exist */
        if ($user !== null && !empty($user))
            return 0;

        $params['password'] = hash('sha256', $params['password']);
        $customerModel = new CustomerModel();
        $user = $customerModel->insertCustomer($params);

        /* server error */
        if ($user !== true)
            return -1;

        return $user;
    }

    public function resetPassword($email){

        $user = $this->emailExists($email);
        if ($user === null || empty($user))
            return null;

        $user = $user[0];

        $passwordHashed = hash('sha256', $this->rand_string(10));
        $user['password'] = $passwordHashed;

        $parameters = array(
            'email' => $user['email'],
            'password' => $user['password'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'birthday_date' => $user['birthday_date'],
            'gender' => $user['gender'],
            'picture' => $user['picture'],
            'phone' => $user['phone'],
            'id_address' =>$user['id_address'],
            'newsletter' =>$user['newsletter']
        );

        $customer = new CustomerModel();
        $customer = $customer->updateCustomer($parameters);

        if($customer === false)
            return false;

        return true;
    }

    private function rand_string( $length ) {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz!@#$%&*";
        $size = strlen( $chars );
        $arr = array();
        for( $i = 0; $i < $length; $i++ ) {
            array_push($arr, $chars[ rand( 0, $size - 1 ) ]);
        }

        return implode($arr);
    }

    public function emailExists(string $email) {
        $customer = new CustomerModel();
        $customer = $customer->getCustomer($email);
        return $customer;
    }

    public function correctPassword(string $password, array $user) : bool {
        $passwordHashed = hash('sha256', $password);

        return $user['password'] == $passwordHashed;
    }

}
