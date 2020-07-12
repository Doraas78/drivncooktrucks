<?php

class FranchiseeModel extends Model
{
    function __construct()
    {
        parent::__construct('FRANCHISEE');
    }


    public function updateFranchisee(array $data) : bool
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET id_truck = :id_truck ,
                    id_headquarter = :id_headquarter ,
                    driver_license = :driver_license,
                    picture = :picture,
                    qrcode = :qrcode,
                    driver_license = :driver_license
                WHERE id = :id';

        return $this->update($sql, $data);
    }

    public function getFranchisees()
    {
        $sql = 'SELECT * 
                FROM FRANCHISEE';

        return $this->query($sql);
    }

    public function getFranchiseeFullDetails(int $id)
    {
        $sql = 'SELECT `FRANCHISEE`.*, FRANCHISEE.id AS idFranchisee, TRUCK.*, ADDRESS.*, CITY.*, CITY.name AS nameCity, FRANCHISEE.creation_date AS dateCreationFranchisee FROM `FRANCHISEE`
                INNER JOIN TRUCK ON TRUCK.id = FRANCHISEE.id_truck
                INNER JOIN ADDRESS ON ADDRESS.id = TRUCK.id_address
                INNER JOIN CITY ON CITY.id = ADDRESS.city
                WHERE FRANCHISEE.id = ?';

        return $this->query($sql, [$id], false, true);
    }

    public function getFranchiseeByID(int $id)
    {
        return $this->findID($id);
    }

    public function changeAddressTruck(array $data)
    {
        $sql = "UPDATE `ADDRESS` 
                SET `city`= :city,
                    `number`=:number,
                    `street`=:street,
                    `type_of_road`= :type_of_road
                WHERE ADDRESS.id = :id_address";

       return $this->query($sql, $data, true);
    }

    public function getFranchiseeByKey(string $key, $value, bool $oneResult = false)
    {
        return $this->find($key, $value, $oneResult);
    }

    public function deleteFranchisee(string $key, $value) : bool
    {
        return $this->delete($key, $value);
    }

    public function getLastFranchisee() : string
    {
        $data = $this->lastInsertId();
        return $data;
    }

    public function deleteDrinkByFranchisee($id)
    {
        $sql =  'DELETE FROM `FRANCHISEE_DRINK` 
                 WHERE FRANCHISEE_DRINK.id_franchisee = ?';

        return $this->query($sql, [$id], true);

    }

    public function deleteMealByFranchisee($id)
    {
        $sql =  'DELETE FROM `FRANCHISEE_MEAL` 
                 WHERE FRANCHISEE_MEAL.id_franchisee = ?';

        return $this->query($sql, [$id], true);

    }

    public function deleteMenuByFranchisee($id)
    {
        $sql =  'DELETE FROM `FRANCHISEE_MENU` 
                 WHERE FRANCHISEE_MENU.id_franchisee = ?';

        return $this->query($sql, [$id], true);

    }

    public function deleteIngredientByFranchisee($id)
    {
        $sql =  'DELETE FROM `FRANCHISEE_INGREDIENT` 
                 WHERE FRANCHISEE_INGREDIENT.id_franchisee = ?';

        return $this->query($sql, [$id], true);

    }






}