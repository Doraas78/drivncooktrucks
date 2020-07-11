<?php

class FranchiseeModel extends Model
{
    function __construct()
    {
        parent::__construct('FRANCHISEE');
    }

    public function insertFranchisee()
    {


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
        return $this->all();
    }

    public function getFranchiseeByID(int $id)
    {
        return $this->findID($id);
    }

    public function getFranchiseeByKey(string $key, $value, bool $oneResult = false)
    {
        return $this->find($key, $value, $oneResult);
    }

    public function getFranchiseeByPage($data)
    {
        $sql = 'SELECT *, COUNT(*) OVER() AS total_row FROM ' . $this->getTable() . ' 
        LIMIT :limit
        OFFSET :begin';

        return $this->query($sql, $data);
    }

    public function deleteFranchisee(string $key, $value) : bool
    {
        $data = $this->delete($key, $value);
        return $data;
    }

    public function getLastFranchisee() : string
    {
        $data = $this->lastInsertId();
        return $data;
    }

    public function getDirectorOfFranchisee($id)
    {
        $sql =  'SELECT *
                 FROM EMPLOYEE
                 WHERE EMPLOYEE.id_franchisee =' . $id . ' && role = ' . RoleEnumModel::DIRECTEUR_FRANCHISE;

        return $this->query($sql, [], false, true);

    }

    public function getTableFRANCHISEE_MEALJoin(int $id_franchisee, int $id_meal)
    {
        $sql = 'SELECT * FROM 
            	FRANCHISEE_MEAL f_m
                INNER JOIN FRANCHISEE f on f.id = f_m.id_franchisee
                INNER JOIN MEAL m on m.id = f_m.id_meal
                WHERE f_m.id_franchisee = ? AND m.id = ?;';

        return $this->query($sql, [$id_franchisee, $id_meal]);

    }

    public function getTableFRANCHISEE_MENUJoin(int $id_franchisee, int $id_menu)
    {
        $sql = 'SELECT * FROM 
            	FRANCHISEE_MENU f_m
                INNER JOIN FRANCHISEE f on f.id = f_m.id_franchisee
                INNER JOIN MENU m on m.id = f_m.id_menu
                WHERE f_m.id_franchisee = ? AND m.id = ?;';

        return $this->query($sql, [$id_franchisee, $id_menu]);

    }

    public function getTableFRANCHISEE_INGREDIENTJoin(int $id_franchisee, int $id_menu)
    {
        $sql = 'SELECT * FROM 
            	FRANCHISEE_INGREDIENT f_i
                INNER JOIN FRANCHISEE f on f.id = f_i.id_franchisee
                INNER JOIN INGREDIENT m on m.id = f_i.id_ingredient
                WHERE f_i.id_franchisee = ? AND m.id = ?;';

        return $this->query($sql, [$id_franchisee, $id_menu]);
    }

    public function getTableFRANCHISEE_DRINKJoin(int $id_franchisee, int $id_menu)
    {
        $sql = 'SELECT * FROM 
            	FRANCHISEE_DRINK f_d
                INNER JOIN FRANCHISEE f on f.id = f_d.id_franchisee
                INNER JOIN DRINK m on m.id = f_d.id_drink
                WHERE f_d.id_franchisee = ? AND m.id = ?;';

        return $this->query($sql, [$id_franchisee, $id_menu]);
    }

}