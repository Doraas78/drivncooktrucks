<?php


class TruckModel extends Model
{
    function __construct()
    {
        parent::__construct('TRUCK');
    }

    public function insertTruck($data)
    {
        $parameters = array(
            'id_headquarter' => $data['id_headquarter'],
            'name' => $data['name'],
            'location' => $data['location'],
            'creation_date' => NOW('y-m-d'),
            'litres_of_gasoline' => $data['litres_of_gasoline'],
            'empty_weight' => $data['empty_weight'],
            'charge_capacity' => $data['charge_capacity'],
            'content' => $data['content'],
            'guarantee' => $data['guarantee'],
            'the_certificate_of_sanitary_and_technical_approval' => $data['the_certificate_of_sanitary_and_technical_approval'],
            'registration_document' => $data['registration_document']
        );

        $sql = 'INSERT INTO' . ' ' . $this->getTable() . '
                    (id_headquarter, 
                    name, 
                    location, 
                    creation_date,
                    litres_of_gasoline, 
                    empty_weight, 
                    charge_capacity, 
                    content, 
                    guarantee, 
                    the_certificate_of_sanitary_and_technical_approval, 
                    registration_document) 
                VALUES ( 
                    :id_headquarter,
                    :name,
                    :location,
                    :creation_date,
                    :litres_of_gasoline,
                    :empty_weight,
                    :charge_capacity,
                    :content, 
                    :guarantee,
                    :the_certificate_of_sanitary_and_technical_approval,
                    :registration_document)';


        return $this->insert($sql, $parameters);
    }

    public function updateTruck(array $data) : bool
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET id_truck = :id_truck ,
                    id_headquarter = :id_headquarter ,
                    name = :name,
                    location = :location,
                    litres_of_gasoline = :litres_of_gasoline,
                    empty_weight = :empty_weight,
                    charge_capacity = :charge_capacity,
                    content = :content,
                    guarantee = :guarantee,
                    the_certificate_of_sanitary_and_technical_approval = :the_certificate_of_sanitary_and_technical_approval,
                    registration_document = :registration_document
                WHERE id = :id';

        return $this->update($sql, $data);
    }

    public function getTrucks()
    {
        return $data = $this->all();
    }

    public function getTruckByID(int $id)
    {
        $data = $this->findID($id);
    }

    public function getFullTrucks()
    {
        $sql = 'SELECT *, CITY.name AS cityName, TRUCK.name AS truckName, TRUCK.id AS idTruck, FRANCHISEE.id AS idFranchisee
                FROM `TRUCK`
                LEFT JOIN FRANCHISEE ON FRANCHISEE.id_truck = TRUCK.id
                LEFT JOIN ADDRESS ON ADDRESS.id = TRUCK.id_address
                LEFT JOIN CITY ON CITY.id = ADDRESS.city';

        return $this->query($sql);
    }

    public function getTruckFullInfos(int $id)
    {
        $sql = 'SELECT *, FRANCHISEE.id AS idFranchisee
                FROM `TRUCK`
                LEFT JOIN FRANCHISEE ON FRANCHISEE.id_truck = TRUCK.id
                WHERE TRUCK.id = ?';

        return $this->query($sql, [$id], false, true);

    }


    public function deleteTruck(string $key, $value) : bool
    {
        return $this->delete($key, $value);
    }

    public function getLastTruck() : string
    {
        return $this->lastInsertId();
    }

    public function getTruckByEmployeeHeadquarter()
    {
        return $this->query('SELECT id
                                     FROM TRUCK
                                     WHERE TRUCK.id_headquarter =' . $_SESSION['user']['id_headquarter'], [], false, true);
    }
}