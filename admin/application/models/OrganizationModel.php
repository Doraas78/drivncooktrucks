<?php


class OrganizationModel extends Model
{
    function __construct()
    {
        parent::__construct('ORGANIZATION');
    }

    public function insertOrganization($data)
    {
        $parameters = array(
            'id_event' => $data['id_event'],
            'id_truck' => $data['id_truck'],
        );

        $sql = 'INSERT INTO' . ' ' . $this->getTable() . '
                    (id_event, 
                    id_truck)
                VALUES ( 
                    :id_event,
                    :id_truck
                    )';

        return $this->insert($sql, $parameters);
    }

    public function updateOrganization(array $data) : bool
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET id_event = :id_event,
                    id_truck = :id_truck,
                    
                WHERE id_event = :id_event && id_truck = :id_truck ';

        return $this->update($sql, $data);
    }

    public function getOrganizations()
    {
        $sql = 'SELECT *
                FROM ' . $this->getTable() .  '
                INNER JOIN EVENT ON EVENT.id = ORGANIZATION.id_event 
                INNER JOIN TRUCK ON TRUCK.id = ORGANIZATION.id_truck';

        return $this->query($sql);
    }

    public function getValidOrganizations()
    {
        $sql = 'SELECT ORGANIZATION.*, EVENT.*, TRUCK.*, EVENT.name AS eventName, TRUCK.name AS truckName
                FROM ORGANIZATION
                INNER JOIN EVENT ON EVENT.id = ORGANIZATION.id_event 
                INNER JOIN TRUCK ON TRUCK.id = ORGANIZATION.id_truck
                INNER JOIN ADDRESS ON TRUCK.id_address = ADDRESS.id
                WHERE EVENT.valid = 1 && EVENT.active = 1';

        return $this->query($sql);
    }

    public function getInvalidOrganizations()
    {
        $sql = 'SELECT *
                FROM ' . $this->getTable() .  '
                INNER JOIN EVENT ON EVENT.id = ORGANIZATION.id_event 
                INNER JOIN TRUCK ON TRUCK.id = ORGANIZATION.id_truck
                WHERE EVENT.valid = 0 && EVENT.active = 1';

        return $this->query($sql);
    }

    public function getMyOrganizationsActiveAndValid(int $id){

        $sql = 'SELECT ORGANIZATION.*, EVENT.*, TRUCK.*, EVENT.name AS eventName, TRUCK.name AS truckName, (SELECT COUNT(*) FROM `PARTICIPATION` WHERE PARTICIPATION.id_event = EVENT.id) AS currentNumberGuests, TRUCK.name AS truckName
                FROM ORGANIZATION
                INNER JOIN EVENT ON EVENT.id = ORGANIZATION.id_event 
                INNER JOIN TRUCK ON TRUCK.id = ORGANIZATION.id_truck
                INNER JOIN ADDRESS ON TRUCK.id_address = ADDRESS.id';

        return $this->query($sql, [$id]);

    }

    public function getMyOrganizationsActiveAndInvalid(int $id){

        $sql = 'SELECT ORGANIZATION.*, EVENT.*, TRUCK.*, EVENT.name AS eventName, TRUCK.name AS truckName
                FROM ORGANIZATION
                INNER JOIN EVENT ON EVENT.id = ORGANIZATION.id_event
                INNER JOIN TRUCK ON TRUCK.id = ORGANIZATION.id_truck
                INNER JOIN ADDRESS ON TRUCK.id_address = ADDRESS.id
                WHERE ORGANIZATION.id_truck = ? && EVENT.valid = 0 && EVENT.active = 1';

        return $this->query($sql, [$id]);
    }

    public function getOrganizationsByKey($key, $value)
    {
        return $this->find($key, $value);
    }



}