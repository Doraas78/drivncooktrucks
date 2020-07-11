<?php


class EmployeeModel extends Model
{

    function __construct()
    {
        parent::__construct('EMPLOYEE');
    }

    public function insertEmployee($data)
    {
        $parameters = array(
            'id_headquarter' => $data['id_headquarter'],
            'id_franchisee' => $data['id_franchisee'],
            'email' => $data['email'],
            'password' => $data['password'],
            'hiring_date' => NOW('y-m-d'),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birthday_date' => $data['birthday_date'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'picture' => $data['picture'],
            'description' => $data['description'],
            'admin' => $data['admin'],
            'phone' => $data['phone'],
        );

        $sql = 'INSERT INTO' . ' ' . $this->getTable() . '
                    (id_headquarter, 
                    id_franchisee, 
                    email, 
                    password,
                    hiring_date, 
                    first_name, 
                    last_name, 
                    birthday_date, 
                    address, 
                    gender, 
                    picture,
                    description,
                    admin,
                    phone)
                VALUES ( 
                    :id_headquarter
                    :id_franchisee,
                    :email,
                    :password,
                    :hiring_date,
                    :first_name,
                    :last_name,
                    :birthday_date, 
                    :address,
                    :gender,
                    :picture);
                    :description);
                    :admin);
                    :phone)';

        return $this->insert($sql, $parameters);
    }

    public function updateEmployee(array $data) : bool
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET email = :email,
                    password = :password,
                    first_name = :first_name,
                    last_name = :last_name,
                    address = :address,
                    picture = :picture,
                    description = :description,
                    admin = :admin,
                    phone = :phone
                WHERE id = :id';

        return $this->update($sql, $data);
    }

    public function getEmployees()
    {
        return $data = $this->all();
    }

    public function getEmployeeByID(int $id)
    {
        return $this->findID($id);
    }

    public function getEmployeeByKey(string $key, $value, bool $oneResult = false)
    {
        return $this->find($key, $value, $oneResult);
    }

    public function getEmployeeByPage($data)
    {
        $sql = 'SELECT *, COUNT(*) OVER() AS total_row FROM ' . $this->getTable() . ' 
        LIMIT :limit
        OFFSET :begin';

        return $this->query($sql, $data);
    }

    public function deleteEmployee(string $key, $value) : bool
    {
        return $this->delete($key, $value);
    }

    public function getLastEmployee() : string
    {
        return $this->lastInsertId();
    }

}