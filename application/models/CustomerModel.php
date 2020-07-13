<?php


class CustomerModel extends Model
{
    function __construct()
    {
        parent::__construct('CUSTOMER');
    }

    public function insertCustomer($data)
    {

        $parameters = array(
            'email' => $data['email'],
            'password' => $data['password'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birthday_date' => $data['birthday_date'],
            'gender' => $data['gender'],
            'picture' => $data['picture'],
            'phone' => $data['phone'],
            'date_creation' =>$data['date_creation'],
            'id_address' =>$data['id_address'],
            'newsletter' =>$data['newsletter']
        );

        $sql = 'INSERT INTO' . ' ' . $this->getTable() . '
                    ( email, 
                    password,
                    first_name,
                    last_name,
                    birthday_date, 
                    gender,
                    phone,
                    picture,
                    date_creation,
                    id_address,
                    newsletter)
                VALUES 
                    (:email, 
                    :password,
                    :first_name,
                    :last_name,
                    :birthday_date, 
                    :gender,
                    :phone,
                    :picture,
                    :date_creation,
                    :id_address,
                    :newsletter)';

        return $this->insert($sql, $parameters);
    }

    public function updateCustomer(array $data)
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET password = :password,
                    first_name = :first_name,
                    last_name = :last_name,
                    picture = :picture,
                    gender = :gender,
                    phone = :phone,
                    birthday_date = :birthday_date,
                    id_address = :id_address,
                    newsletter = :newsletter
                WHERE email = :email';

        return $this->update($sql, $data);
    }

    public function updateCustomerEmail(array $data)
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET email = :new_email
                WHERE email = :email';

        return $this->update($sql, $data);
    }

    public function updateCustomerPassword(array $data)
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET password = :new_password,
                WHERE email = :email';

        return $this->update($sql, $data);
    }


    public function getCustomers()
    {
        return $this->all();
    }

    public function getCustomer(string $email)
    {
        return $this->find('email', $email, true);
    }

    public function getCustomerFull(string $email)
    {
        $sql = 'SELECT * FROM ' . $this->getTable() . '
                JOIN ADDRESS ON ' . $this->getTable() . '.id_address = ADDRESS.id
                JOIN CITY ON ADDRESS.city = CITY.id
                WHERE ' . $this->getTable() . '.email = ?';

        return $this->query($sql, [$email], false, true);
    }

    public function deleteCustomer(string $key, $value) : bool
    {
        return $this->delete($key, $value);
    }

    public function getLastCustomer() : string
    {
        return $this->lastInsertId();
    }

    public function updateNewslettersCustomer(int $newsletter, string $email)
    {
        $sql = "UPDATE CUSTOMER SET newsletter= ? WHERE CUSTOMER.email = ?";

        return $this->update($sql, [$newsletter, $email]);

    }

}