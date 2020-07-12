<?php


class OrderModel extends Model
{
    function __construct()
    {

        parent::__construct('ORDER');
    }

    /* INSERT */

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

        $sql = 'INSERT INTO `ORDER` (id_franchisee,email_customer,`name`,`date`,`status`,tva,price, reduction, `description`, `number`)
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


    /* GET */

    public function getOrdersByCustomer(string $email){

        $sql = 'SELECT * FROM `ORDER`
                WHERE `ORDER`.`email_customer` = ?;';

        return $this->query($sql, [$email]);
    }

    public function getOrderDrinks(int $idOrder){

        $sql = 'SELECT * FROM ORDER_DRINK
                INNER JOIN DRINK ON DRINK.id = ORDER_DRINK.id_drink
                WHERE ORDER_DRINK.id_order = ?;';

        return $this->query($sql, [$idOrder]);
    }

    public function getOrderIngredients(int $idOrder){

        $sql = 'SELECT * FROM ORDER_INGREDIENT
                INNER JOIN INGREDIENT ON INGREDIENT.id = ORDER_INGREDIENT.id_ingredient
                WHERE ORDER_INGREDIENT.id_order = ?';

        return $this->query($sql, [$idOrder]);
    }

    public function getOrderMeals(int $idOrder){

        $sql = 'SELECT * FROM ORDER_MEAL
                INNER JOIN MEAL ON MEAL.id = ORDER_MEAL.id_meal
                WHERE ORDER_MEAL.id_order = ?';


        return $this->query($sql, [$idOrder]);

    }

    public function getOrderMenus(int $idOrder){

        $sql = 'SELECT * FROM ORDER_MENU
                INNER JOIN MENU ON MENU.id = ORDER_MENU.id_menu
                WHERE ORDER_MENU.id_order = ?';

        return $this->query($sql, [$idOrder]);
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


/*
 *
 * SELECT * FROM `ORDER`
WHERE `ORDER`.`email_customer` = 'massimo@gmail.com';

SELECT * FROM ORDER_DRINK
INNER JOIN DRINK ON DRINK.id = ORDER_DRINK.id_drink
WHERE ORDER_DRINK.id_order = 22;

SELECT * FROM ORDER_INGREDIENT
INNER JOIN INGREDIENT ON INGREDIENT.id = ORDER_INGREDIENT.id_ingredient
WHERE ORDER_INGREDIENT.id_order = 22;

SELECT * FROM ORDER_MENU
INNER JOIN MENU ON MENU.id = ORDER_MENU.id_menu
WHERE ORDER_MENU.id_order = 22;

SELECT * FROM ORDER_MEAL
INNER JOIN MEAL ON MEAL.id = ORDER_MEAL.id_meal
WHERE ORDER_MEAL.id_order = 22;
 */