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

    public function getTrucksFullAddressActive()
    {
        $sql = 'SELECT id_truck, TRUCK.name, TRUCK.id_address, ADDRESS.street, ADDRESS.country, ADDRESS.type_of_road, ADDRESS.number, CITY.zip_code, CITY.name as cityName, DEPARTMENT.name as departmentName, CITY.gps_latitude, CITY.gps_longitude, FRANCHISEE.id as id_franchisee
                FROM FRANCHISEE
                INNER JOIN TRUCK
                ON FRANCHISEE.id_truck = TRUCK.id
                INNER JOIN ADDRESS
                ON ADDRESS.id = TRUCK.id_address
                INNER JOIN CITY
                ON ADDRESS.city = CITY.id
                INNER JOIN DEPARTMENT
                ON CITY.division_code = DEPARTMENT.code
                INNER JOIN REGION
                ON DEPARTMENT.district_code = REGION.code' ;

        return $this->query($sql);
    }

    public function getOneTruckFullAddressActive(int $id)
    {
        $sql = 'SELECT id_truck, TRUCK.name, TRUCK.id_address, ADDRESS.street, ADDRESS.country, ADDRESS.type_of_road, ADDRESS.number, CITY.zip_code, CITY.name as cityName, DEPARTMENT.name as departmentName, CITY.gps_latitude, CITY.gps_longitude, FRANCHISEE.id as id_franchisee
                FROM FRANCHISEE
                INNER JOIN TRUCK
                ON FRANCHISEE.id_truck = TRUCK.id
                INNER JOIN ADDRESS
                ON ADDRESS.id = TRUCK.id_address
                INNER JOIN CITY
                ON ADDRESS.city = CITY.id
                INNER JOIN DEPARTMENT
                ON CITY.division_code = DEPARTMENT.code
                INNER JOIN REGION
                ON DEPARTMENT.district_code = REGION.code
                WHERE TRUCK.id = ?' ;

        return $this->query($sql, [$id], false, true);
    }

    public function getTrucksMeals(int $id)
    {
        $sql = 'SELECT * FROM 
                FRANCHISEE f 
                INNER JOIN FRANCHISEE_MEAL f_m on f_m.id_franchisee = f.id
                INNER JOIN MEAL m on f_m.id_meal= m.id 
                WHERE f.id = ?;' ;

        return $this->query($sql, [$id]);
    }

    public function getTrucksMenus(int $id)
    {
        $sql = 'SELECT * FROM 
                FRANCHISEE f 
                INNER JOIN FRANCHISEE_MENU f_m on f_m.id_franchisee = f.id
                INNER JOIN MENU m on f_m.id_menu= m.id 
                WHERE f.id = ?;' ;

        return $this->query($sql, [$id]);
    }

    public function getTrucksIngredients(int $id)
    {
        $sql = 'SELECT * FROM 
                FRANCHISEE f 
                INNER JOIN FRANCHISEE_INGREDIENT f_i on f_i.id_franchisee = f.id
                INNER JOIN INGREDIENT i on f_i.id_ingredient= i.id
                WHERE f.id = ?;' ;

        return $this->query($sql, [$id]);
    }

    public function getTrucksDrinks(int $id)
    {
        $sql = 'SELECT * FROM 
                FRANCHISEE f 
                INNER JOIN FRANCHISEE_DRINK f_d on f_d.id_franchisee= f.id
                INNER JOIN DRINK d on f_d.id_drink= d.id 
                WHERE f.id = ?;' ;

        return $this->query($sql, [$id]);
    }
    public function getTruckByEmployeeHeadquarter()
    {
        return $this->query('SELECT id
                                     FROM TRUCK
                                     WHERE TRUCK.id_headquarter =' . $_SESSION['user']['id_headquarter'], [], false, true);
    }
}

