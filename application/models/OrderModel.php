<?php


class OrderModel extends Model
{
    function __construct()
    {
        define('WAIT', 1);
        define('IN_PROGRESS', 2);
        define('DONE', 3);

        parent::__construct('ORDER');
    }

    public function insertOrder(array $data){

        $parameters = array(
            'id_franchisee'        => $data['id_franchisee'],
            'email_customer'      => $data['email_customer'],
            'name'    => $data['name'],
            'date'     => Date('Y-m-d'),
            'status'      => WAIT,
            'tva'        => $data['tva'],
            'price' => $data['price'],
            'reduction' => $data['reduction'],
            'description' => $data['description'],
            'number' => $this->generateRandomString()
        );

        var_dump($parameters);
        $sql = 'INSERT INTO `ORDER` (id_franchisee,email_customer,name,date,status,tva,price, reduction, description, number)
            VALUES (:id_franchisee,:email_customer,:name,:date,:status,:tva,:price, :reduction, :description, :number)';

        return $this->insert($sql, $parameters);
    }

    public function insertOrderDrink(array $data){

        $parameters = array(
            'id_order'        => $data['id_order'],
            'id_drink'      => $data['id_drink'],
            'quantity_drink'    => $data['quantity_drink'],
        );

        $sql = 'INSERT INTO ORDER_DRINK
                    (id_order,id_drink,quantity_drink)
            VALUES (:id_order,:id_drink,:quantity_drink)';

        $this->insert($sql, $parameters);
    }

    public function insertOrderIngredient(array $data){

        $parameters = array(
            'id_order'        => $data['id_order'],
            'id_ingredient'      => $data['id_ingredient'],
            'quantity_ingredient'    => $data['quantity_ingredient'],
        );

        $sql = 'INSERT INTO ORDER_INGREDIENT
                    (id_order,id_ingredient,quantity_ingredient)
            VALUES (:id_order,:id_ingredient,:quantity_ingredient)';

        $this->insert($sql, $parameters);
    }

    public function insertOrderMeal(array $data){

        $parameters = array(
            'id_order'        => $data['id_order'],
            'id_meal'      => $data['id_meal'],
            'quantity_meal'    => $data['quantity_meal'],
        );

        $sql = 'INSERT INTO ORDER_MEAL
                    (id_order,id_meal,quantity_meal)
            VALUES (:id_order,:id_meal,:quantity_meal)';

        $this->insert($sql, $parameters);
    }

    public function insertOrderMenu(array $data){

        $parameters = array(
            'id_order'        => $data['id_order'],
            'id_menu'      => $data['id_menu'],
            'quantity_menu'    => $data['quantity_menu'],
        );

        $sql = 'INSERT INTO ORDER_MENU
                    (id_order,id_menu,quantity_menu)
            VALUES (:id_order,:id_menu,:quantity_menu)';

        $this->insert($sql, $parameters);
    }


    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getLastOrderInserted()
    {
        $sql = 'SELECT `ORDER`.id FROM `ORDER` ORDER BY id DESC LIMIT 0, 1';

        return $this->query($sql, [], false, true);
    }

}