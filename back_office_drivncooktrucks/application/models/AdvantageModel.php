<?php

class AdvantageModel extends Model{

    function __construct()
    {
        parent::__construct('ADVANTAGE');
    }

    public function insertAdvantage() : bool
    {
        $data = array(
            'type' => 1,
            'description' => 'description here man !',
            'promo_code' => '544654'
        );

        $sql = 'INSERT INTO ' . $this->getTable() . ' (type, description, begin_date, end_date, promo_code) VALUES(:type, :description, NOW(), NOW(), :promo_code)';

        return $this->insert($sql, $data);
    }

    public function updateAdvantage(array $data, int $id) : bool
    {
        $data = array(
            'id' => 515,
            'type' => 1,
            'description' => '123test',
            'promo_code' => '196848+'
        );

        $sql = 'UPDATE ' . $this->getTable() . ' 
                SET type = :type,
                    description = :description,
                    promo_code = :promo_code 
                WHERE id = :id';

        return $this->update($sql, $data);
    }

    public function getAdvantages()
    {
        $data = $this->all();
        /*$adv = new AdvantageModel();
        $adv->getAdvantages();*/
    }

    public function getAdvantageByID(int $id)
    {
        return $data = $this->findID($id);
    }

    public function getAdvantageByKey(string $key, $value)
    {
        return $data = $this->find($key, $value);
    }

    public function deleteAdvantage(string $key, $value) : bool
    {
        return $data = $this->delete($key, $value);
    }

    public function getLastAdvantage() : string
    {
        return $data = $this->lastInsertId();
    }
}