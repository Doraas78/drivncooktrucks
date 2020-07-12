<?php


class EventModel extends Model
{

    function __construct()
    {
        parent::__construct('EVENT');
    }

    public function insertEvent($data)
    {
        $parameters = array(
            'name' => $data['name'],
            'begin_date' => $data['begin_date'],
            'end_date' => $data['end_date'],
            'number_of_guests' => $data['number_of_guests'],
            'celebrity' => $data['celebrity'],
            'active' => 1,
            'valid' => 0,
            'description' => $data['description'],
            'picture' => $data['picture']
        );

        $sql = 'INSERT INTO' . ' ' . $this->getTable() . '
                    (name, 
                    begin_date, 
                    end_date,
                    number_of_guests, 
                    celebrity, 
                    active, 
                    picture, 
                    description,
                    valid)
                VALUES ( 
                    :name,
                    :begin_date,
                    :end_date,
                    :number_of_guests,
                    :celebrity,
                    :active,
                    :picture,
                    :description,
                    :valid
                    )';

        return $this->insert($sql, $parameters);
    }

    public function updateEvent(array $data) : bool
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET name = :name,
                    location = :location,
                    begin_date = :begin_date,
                    end_date = :end_date,
                    number_of_guests = :number_of_guests,
                    celebrity = :celebrity,
                    active = :active,
                    description = :description,
                    picture = :picture,
                    
                WHERE id = :id';

        return $this->update($sql, $data);
    }

    public function getEvents()
    {

        $sql = 'SELECT * 
                FROM ' . $this->getTable() . '
                INNER JOIN EVENT ON EVENT.id = ORGANIZATION.id_event 
                INNER JOIN TRUCK  ON TRUCK.id = ORGANIZATION.id_truck';

        return $this->query($sql);
    }

    public function getEventByID(int $id)
    {
        return $this->findID($id);
    }

    public function getCustomersCountEvent(int $id)
    {
        $sql = 'SELECT COUNT(*) FROM `PARTICIPATION` WHERE PARTICIPATION.id_event = ?';

        $this->query($sql, [$id]);

    }

    public function validateEvent(int $id)
    {
        $sql = 'UPDATE `EVENT` SET `valid`= 1 WHERE EVENT.id = ?';

        return $this->query($sql, [$id], true);
    }

    public function getEventByKey(string $key, $value, bool $oneResult = false)
    {
        return $this->find($key, $value, $oneResult);
    }


    public function deleteEvent(int $id)
    {
        $sql = 'DELETE FROM `ORGANIZATION` 
                WHERE ORGANIZATION.id_event = ?';

        $this->query($sql, [$id], true);

        $sql = 'DELETE FROM `EVENT`
                WHERE EVENT.id = ?';

        return $this->query($sql, [$id], true);

    }


    public function getLastEvent() : string
    {
        return $this->lastInsertId();
    }
}