<?php


class DashboardController extends Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
    }

    public function indexAction()
    {
        $this->data['active_dashboard'] = 1;
        $this->render('user.dashboard', 'template_user', $this->data);
    }

    public function toOrderAction()
    {
        redirect('user', 'Orders', 'index');
    }

    public function profilAction()
    {
        redirect('user', 'Profil', 'index');
    }

    public function cartAction()
    {
        redirect('user', 'Cart', 'index');
    }

    public function eventAction()
    {
        redirect('user', 'Event', 'index');
    }


    public function getFullOrdersAction()
    {

        $orderModel = new OrderModel();
        $orders = $orderModel->getOrdersByCustomer($_SESSION['customer']['email']);

        if($orders === null || count($orders) <= 0)
            echo json_encode(0);
        else{
            $data = [];
            foreach ($orders as $order )
            {

                $order['ingredient'] = $orderModel->getOrderIngredients($order['id']);
                $order['meal'] = $orderModel->getOrderMeals($order['id']);
                $order['menu'] = $orderModel->getOrderMenus($order['id']);
                $order['drink'] = $orderModel->getOrderDrinks($order['id']);

                array_push($data, $order);
            }

            if(count($data) <= 0)
                echo json_encode(0);
            else{
                echo json_encode($data);
            }
        }
    }
}