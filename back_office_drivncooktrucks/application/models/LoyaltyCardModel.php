<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once __DIR__.'/../../framework/core/Model.php';

class LoyaltyCardModel extends Model
{

    function __construct()
    {
        parent::__construct('LOYALTY_CARD');
    }

    public function insertLoyaltyCard($data)
    {
        $parameters = array(
            'email_customer'  => $data['email_customer'],
            'activation_date' => $data['activation_date'],
            'expiration_date' => $data['expiration_date'],
            'number'          => $data['number'],
            'barcode'         => $data['barcode'],
            'points'          => $data['points'],
        );

        $sql = 'INSERT INTO' . ' ' . $this->getTable() . '
                    (email_customer,activation_date,expiration_date,number,barcode,points)
            VALUES (:email_customer,:activation_date,:expiration_date,:number,:barcode,:points)';

        return $this->insert($sql, $parameters);
    }

    public function updateLoyaltyCard(array $data) : bool
    {

        $sql = 'UPDATE ' . $this->getTable() . '
                SET email_customer = :email_customer,
                activation_date = :activation_date,
                expiration_date = :expiration_date,
                number = :number,
                barcode = :barcode,
                points = :points,
                WHERE id = :id';

        return $this->update($sql, $data);
    }

    public function getLoyaltyCards()
    {
        return $data = $this->all();
    }

    public function getLoyaltyCardByID(int $id)
    {
        return $this->findID($id);
    }

    public function getLoyaltyCardByKey(string $key, $value, bool $oneResult = false)
    {
        return $this->find($key, $value, $oneResult);
    }

    public function getLoyaltyCardByPage($data)
    {
        $sql = 'SELECT *, COUNT(*) OVER() AS total_row FROM ' . $this->getTable() . '
        LIMIT :limit
        OFFSET :begin';

        return $this->query($sql, $data);
    }

    public function deleteLoyaltyCard(string $key, $value) : bool
    {
        return $this->delete($key, $value);
    }

    public function getLastLoyaltyCard() : string
    {
        return $this->lastInsertId();
    }

}
