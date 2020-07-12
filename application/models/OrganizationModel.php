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
        $sql = 'SELECT *, CITY.name AS cityName, EVENT.name AS eventName, TRUCK.name AS truckName
                FROM ORGANIZATION
                INNER JOIN EVENT ON EVENT.id = ORGANIZATION.id_event 
                INNER JOIN TRUCK ON TRUCK.id = ORGANIZATION.id_truck
                INNER JOIN ADDRESS ON ADDRESS.id = TRUCK.id_address
                INNER JOIN CITY ON CITY.id = ADDRESS.city
                WHERE EVENT.valid = 1 && EVENT.active = 1';

        return $this->query($sql);
    }

    public function getParticipationCustomer(string $email, int $idEvent)
    {
        $sql = 'SELECT * FROM PARTICIPATION
                WHERE PARTICIPATION.email_customer = ? AND PARTICIPATION.id_event = ?';

       return $this->query($sql, [$email, $idEvent], false, true);

    }

    public function dropParticipationCustomer(string $email, int $idEvent)
    {
        $sql = 'DELETE FROM PARTICIPATION
                WHERE PARTICIPATION.email_customer = ? AND PARTICIPATION.id_event = ?';

        return $this->query($sql, [$email, $idEvent], true);

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

    public function getMyOrganizations(int $id){

        $sql = 'SELECT *
                FROM ORGANIZATION
                INNER JOIN EVENT ON EVENT.id = ORGANIZATION.id_event
                INNER JOIN TRUCK ON TRUCK.id = ORGANIZATION.id_truck
                WHERE ORGANIZATION.id_truck = ? && EVENT.valid = 0 && EVENT.active = 1';

        return $this->query($sql, [$id]);

    }

    public function getOrganizationsByKey($key, $value)
    {
        return $this->find($key, $value);
    }


    public function insertParticipationCustomerToEvent(string $email, int $idEvent)
    {
        $sql = "INSERT INTO `PARTICIPATION` (`email_customer`, `id_event`, `date`) 
                VALUES (?,?, ?)";

        return $this->insert($sql, [$email, $idEvent, Date('Y-m-d')]);
    }


}