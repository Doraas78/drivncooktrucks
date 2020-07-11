<?php


class AddressModel extends Model
{
    function __construct()
    {
        parent::__construct('ADDRESS');
    }

    public function insertAddress($data)
    {
        $parameters = array(
            'city' => $data['city'],
            'number' => $data['number'],
            'street' => $data['street'],
            'type_of_road' => $data['type_of_road'],
            'country' => $data['country']
        );

        $sql = 'INSERT INTO ' . $this->getTable() . '
                    ( city, 
                    number,
                    street,
                    type_of_road,
                    country)
                VALUES 
                    (:city, 
                    :number,
                    :street,
                    :type_of_road,
                    :country)';

        return $this->insert($sql, $parameters);
    }

    public function getLastAddress(): string
    {
        return $this->lastInsertId();
    }

    public function getAddress(int $id): string
    {
        return $this->findID($id);
    }

    public function getOneFullAddress(int $id): string
    {
        $sql = 'SELECT * 
                FROM ADDRESS
                LEFT JOIN CITY
                ON ADDRESS.id = CITY.id
                LEFT JOIN DEPARTMENT
                ON CITY.division_code = DEPARTMENT.code
                LEFT JOIN REGION
                ON DEPARTMENT.district_code = REGION.code
                WHERE ADDRESS.id = ' . $id;

        return $this->query($sql, [], false, true);
    }
}