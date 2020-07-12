<?php

require_once __DIR__.'/../../framework/core/Model.php';
require_once __DIR__.'/LoyaltyCardModel.php';

class CustomerModel extends Model
{
    function __construct()
    {
        parent::__construct('CUSTOMER');
    }

    public function getAllCustomersNewslettersAggreed()
    {
        $sql = 'SELECT CUSTOMER.email FROM CUSTOMER WHERE CUSTOMER.newsletter = 1';

        return $this->query($sql);

    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function insertCustomer($data)
    {
        $parameters = array(
            'email'         => $data['email'],
            'password'      => $data['password'],
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'location'      => $data['address'],
            'gender'        => $data['gender'],
            'birthday_date' => $data['birthday_date'],
            'date_creation' => Date('y-m-d H:i:s'),
            'id_address' => 5,
            'newsletter' => 0
        );

        $sql = 'INSERT INTO' . ' ' . $this->getTable() . '
                    (email,password,first_name,last_name,location,gender,birthday_date, id_address, date_creation, newsletter)
            VALUES (:email,:password,:first_name,:last_name,:location,:gender,:birthday_date, :id_address, :date_creation, :newsletter)';

        $this->insert($sql, $parameters);

        $loyaltyCard = new LoyaltyCardModel();
        $parametersLoyaltyCard = array(
            'email_customer'  => $data['email'],
            'activation_date' => date('Y-m-d'),
            'expiration_date' => date('Y-m-d', strtotime('+1 month')),
            'number'          => $this->generateRandomString(),
            'barcode'         => $this->generateRandomString(),
            'points'          => 0,
        );

        return $loyaltyCard->insertLoyaltyCard($parametersLoyaltyCard);
    }

    public function getCustomerByKey(string $key, $value, bool $oneResult = true)
    {
        return $this->find($key, $value, $oneResult);
    }

}