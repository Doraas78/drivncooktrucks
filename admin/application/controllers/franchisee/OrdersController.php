<?php


class OrdersController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function getFullOrdersAction()
    {
        $data = [];
        $orderModel = new OrderModel();
        $orders = $orderModel->getOrdersByFranchisee($_SESSION['user']['id_franchisee']);

        if($orders === null)
            echo json_encode(0);
        else if(empty($orders))
            echo json_encode(1);
        else{
            foreach ($orders as $order )
            {
                $order['meal'] = $orderModel->getMealsOrders($order['id']);
                $order['drink'] = $orderModel->getDrinksOrders($order['id']);
                $order['ingredient'] = $orderModel->getIngredientsOrders($order['id']);
                $order['menu'] = $orderModel->getMenusOrders($order['id']);

                array_push($data, $order);
            }

            $this->render_data($data);
        }
    }
}