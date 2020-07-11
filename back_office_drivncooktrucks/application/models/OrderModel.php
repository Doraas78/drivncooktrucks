<?php


class OrderModel extends Model
{


    public function __construct()
    {
        parent::__construct('ORDER');

        define('WAIT', 1);
        define('IN_PROGRESS', 2);
        define('DONE', 3);

    }
    public function getOrdersByFranchisee(int $id)
    {
        $sql = 'SELECT * FROM `ORDER` AS O WHERE O.id_franchisee = ?';

        return $this->query($sql, [$id]);

    }


    public function getDrinksOrders(int $id)
    {
        $sql = 'SELECT * FROM `ORDER` AS O
                INNER JOIN ORDER_DRINK ON ORDER_DRINK.id_order = O.id
                INNER JOIN DRINK ON DRINK.id = ORDER_DRINK.id_drink
                WHERE O.id = ?';

        return $this->query($sql, [$id]);

    }

    public function getIngredientsOrders(int $id)
    {
        $sql = 'SELECT * FROM `ORDER` AS O
                INNER JOIN ORDER_INGREDIENT ON ORDER_INGREDIENT.id_order = O.id
                INNER JOIN INGREDIENT ON INGREDIENT.id = ORDER_INGREDIENT.id_ingredient
                WHERE O.id = ?';

        return $this->query($sql, [$id]);

    }

    public function getMenusOrders(int $id)
    {
        $sql = 'SELECT * FROM `ORDER` AS O
                INNER JOIN ORDER_MENU ON ORDER_MENU.id_order = O.id
                INNER JOIN MENU ON MENU.id = ORDER_MENU.id_menu
                WHERE O.id = ?';

        return $this->query($sql, [$id]);

    }

    public function getMealsOrders(int $id)
    {
        $sql = 'SELECT * FROM `ORDER` AS O
                INNER JOIN ORDER_MEAL ON ORDER_MEAL.id_order = O.id
                INNER JOIN MEAL ON MEAL.id = ORDER_MEAL.id_meal
                WHERE O.id = ?';

        return $this->query($sql, [$id]);

    }

}