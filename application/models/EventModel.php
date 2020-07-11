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
            'location' => $data['location'],
            'begin_date' => $data['begin_date'],
            'end_date' => $data['end_date'],
            'number_of_guests' => $data['number_of_guests'],
            'celebrity' => $data['celebrity'],
            'active' => 1,
            'description' => $data['description'],
            'picture' => $data['picture']
        );

        $sql = 'INSERT INTO' . ' ' . $this->getTable() . '
                    (name, 
                    location, 
                    begin_date, 
                    end_date,
                    number_of_guests, 
                    celebrity, 
                    active, 
                    picture, 
                    description)
                VALUES ( 
                    :name,
                    :location,
                    :begin_date,
                    :end_date,
                    :number_of_guests,
                    :celebrity,
                    :active,
                    :picture,
                    :description
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

    public function getEventByKey(string $key, $value, bool $oneResult = false)
    {
        return $this->find($key, $value, $oneResult);
    }

    public function getEventByPage($data)
    {
        $sql = 'SELECT *, COUNT(*) OVER() AS total_row FROM ' . $this->getTable() . ' 
        LIMIT :limit
        OFFSET :begin';

        return $this->query($sql, $data);
    }

    public function getEventsByKeyMultipleValues($key, $array_value)
    {

       return $this->query('SELECT * FROM ' . $this->getTable() .
                                   ' WHERE ' . $key . ' IN (' . $array_value . ')');
    }

    public function deleteEvent(string $key, $value) : bool
    {
        return $this->delete($key, $value);
    }

    public function getLastEvent() : string
    {
        return $this->lastInsertId();
    }
}