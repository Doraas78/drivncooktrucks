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
                    first_name = :first_name,
                    last_name = :last_name,
                    gender = :gender,
                    birthday_date = :birthday_date,
                    description = :description,
                    phone = :phone
                WHERE id = :id';

        return $this->update($sql, $data);
    }

    public function updateEmployeeAdminFewInfos(array $data)
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET email = :email,
                    first_name = :first_name,
                    last_name = :last_name,
                    phone = :phone,
                    city = :city
                WHERE id = :id';

        return $this->update($sql, $data);
    }


    public function updateEmployeeEmail(array $data)
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET email = :new_email
                WHERE email = :email';

        return $this->update($sql, $data);
    }

    public function updateEmployeePassword(array $data)
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET password = :new_password
                WHERE email = :email';

        return $this->update($sql, $data);
    }


    public function getEmployees()
    {
        return $this->all();
    }

    public function getFullEmployeeByID(int $id)
    {
        $sql = 'SELECT EMPLOYEE.* ,EMPLOYEE.id AS idEmployee, ADDRESS.*, CITY.* FROM `EMPLOYEE` 
                INNER JOIN ADDRESS ON ADDRESS.id = EMPLOYEE.id_address
                INNER JOIN CITY ON CITY.id = ADDRESS.city
                WHERE EMPLOYEE.id = ?';

        return $this->query($sql, [$id], false, true);
    }

    public function getFullEmployeeByEmail(string $email)
    {
        $sql = 'SELECT EMPLOYEE.* ,EMPLOYEE.id AS idEmployee, ADDRESS.*, CITY.* FROM `EMPLOYEE` 
                INNER JOIN ADDRESS ON ADDRESS.id = EMPLOYEE.id_address
                INNER JOIN CITY ON CITY.id = ADDRESS.city
                WHERE EMPLOYEE.email = ?';

        return $this->query($sql, [$email], false, true);
    }

    public function changeAddressEmployee(array $data)
    {
        $sql = "UPDATE ADDRESS
                SET `city` = :city,
                    `number` = :number,
                    `street` = :street,
                    `type_of_road` = :type_of_road
                WHERE ADDRESS.id = :id_address";

        return $this->query($sql, $data, true);
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