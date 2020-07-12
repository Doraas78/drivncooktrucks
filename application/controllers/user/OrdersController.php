<?php


class OrdersController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data['active_order'] = 1;

    }

    public function indexAction()
    {
        $this->render('user.trucks', 'template_user' ,$this->data);
    }

    public function insertFullOrderAction()
    {
        var_dump($_SESSION['cart']);

        $cart = $_SESSION['cart'];

        $orderModel = new OrderModel();

        $parameters = array(
            'id_franchisee'     => (int)$_POST['id_franchisee'],
            'email_customer'    => $_SESSION['customer']['email'],
            'name'              => $_POST['name'],
            'tva'               =>(float) $_POST['tva'],
            'price'             => (float)$_POST['price'],
            'reduction'         => (float)$_POST['reduction'],
            'description'       => null
        );
        $order = $orderModel->insertOrder($parameters);
        var_dump($order);
        $idOrder = $orderModel->getLastOrderInserted();
        $idOrder = $idOrder['id'];
        var_dump($idOrder);

        if($order === true)
        {

            foreach ($cart as $keyTruck => $valueTruck )
            {

                foreach ($valueTruck as $keyCategoryFood => $valueCategoryFood) {

                    switch ($keyCategoryFood) {
                        case 'meal':

                            foreach ($valueCategoryFood as $keyFood => $valueFood) {

                                $parameters = array(
                                    'id_order'        => $idOrder,
                                    'id_meal'      => $keyFood,
                                    'quantity_meal'    => $valueFood,
                                );
                                $orderModel->insertOrderMeal($parameters);
                            }
                            break;

                        case 'menu':

                            foreach ($valueCategoryFood as $keyFood => $valueFood) {

                                $parameters = array(
                                    'id_order'        => $idOrder,
                                    'id_menu'      => $keyFood,
                                    'quantity_menu'    => $valueFood,
                                );

                                $orderModel->insertOrderMenu($parameters);
                            }
                            break;

                        case 'ingredient':
                            foreach ($valueCategoryFood as $keyFood => $valueFood) {

                                $parameters = array(
                                    'id_order'        => $idOrder,
                                    'id_ingredient'      => $keyFood,
                                    'quantity_ingredient'    => $valueFood,
                                );

                                $orderModel->insertOrderIngredient($parameters);
                            }
                            break;
                        case 'drink':
                            foreach ($valueCategoryFood as $keyFood => $valueFood) {

                                $parameters = array(
                                    'id_order'        => $idOrder,
                                    'id_drink'      => $keyFood,
                                    'quantity_drink'    => $valueFood,
                                );

                                $orderModel->insertOrderDrink($parameters);
                            }
                            break;
                        default:
                            break;
                    }
                }

            }

        }else{
            echo json_encode(0);
        }


    }

    public function truckMealsViewAction()
    {
        $truckModel = new TruckModel();
        $temp = $truckModel->getOneTruckFullAddressActive($_GET['id']);
        $this->data['truck'] = $temp;
        $this->render('user.truckMeals', 'template_user', $this->data);
    }

    public function truckMenusViewAction()
    {
        $truckModel = new TruckModel();
        $temp = $truckModel->getOneTruckFullAddressActive($_GET['id']);
        $this->data['truck'] = $temp;
        $this->render('user.truckMenus', 'template_user', $this->data);
    }

    public function truckIngredientsViewAction()
    {
        $truckModel = new TruckModel();
        $temp = $truckModel->getOneTruckFullAddressActive($_GET['id']);
        $this->data['truck'] = $temp;
        $this->render('user.truckIngredients', 'template_user', $this->data);
    }

    public function truckDrinksViewAction()
    {
        $truckModel = new TruckModel();
        $temp = $truckModel->getOneTruckFullAddressActive($_GET['id']);
        $this->data['truck'] = $temp;
        $this->render('user.truckDrinks', 'template_user', $this->data);
    }


    public function getTruckMealsAction()
    {
        $truckModel = new TruckModel();
        $data['truck']['meals'] = $truckModel->getTrucksMeals(intval($_GET['id']));

        echo json_encode($data);
    }

    public function getTruckMenusAction()
    {
        $truckModel = new TruckModel();
        $data['truck']['menus'] = $truckModel->getTrucksMenus(intval($_POST['id']));
        echo json_encode($data);
    }

    public function getTruckIngredientAction()
    {
        $truckModel = new TruckModel();
        $data['truck']['ingredients'] = $truckModel->getTrucksIngredients(intval($_GET['id']));

        echo json_encode($data);
    }

    public function getTruckDrinksAction()
    {
        $truckModel = new TruckModel();
        $data['truck']['drinks'] = $truckModel->getTrucksDrinks(intval($_GET['id']));

        echo json_encode($data);
    }

    public function getTrucksFewInfosAction()
    {
        $truckModel = new TruckModel();
        $data = $truckModel->getTrucksFullAddressActive();

        $this->render_data($data);
    }

    public function getTrucksMealAction()
    {
        $truckModel = new TruckModel();
        $data = $truckModel->getTrucksMeal($_POST['id']);

        $this->render_data($data);
    }

    /* MANAGEMENT CART */

    private function createCart()
    {

        /* check cart if exist */
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    }

    public function saveCartAction()
    {

        $this->createCart();

        $id_truck = $_POST['id_truck'];
        $cart = $_POST['cart'];

        var_dump($_SESSION['cart']);
        var_dump($_POST);

        if (is_array($_POST['item'])) {

            foreach ($_POST['item'] as $valueTypeFood) {
                switch ($valueTypeFood) {
                    case 'meal':

                        foreach ($cart['meal'] as $value) {


                            if ($value['quantity_meal'] <= 0) {
                                if (array_key_exists($value['id_meal'], $_SESSION['cart'][$id_truck]['meal']) !== false) {
                                    unset($_SESSION['cart'][$id_truck]['meal'][$value['id_meal']]);
                                }
                            } else {
                                $_SESSION['cart'][$id_truck]['meal'][$value['id_meal']]['quantity_meal'] = $value['quantity_meal']; // change quantity of meal
                            }
                        }
                        var_dump($_SESSION['cart'][$id_truck]);

                        break;
                    case 'menu':

                        foreach ($cart['menu'] as $value) {


                            if ($value['quantity_menu'] <= 0) {

                                if (array_key_exists($value['id_menu'], $_SESSION['cart'][$id_truck]['menu']) !== false) {
                                    unset($_SESSION['cart'][$id_truck]['menu'][$value['id_menu']]);
                                }
                            } else {
                                $_SESSION['cart'][$id_truck]['menu'][$value['id_menu']]['quantity_menu'] = $value['quantity_menu']; // change quantity of menu
                            }
                        }
                        var_dump($_SESSION['cart'][$id_truck]);

                        break;
                    case 'ingredient':

                        foreach ($cart['ingredient'] as $value) {


                            if ($value['quantity_ingredient'] <= 0) {

                                if (array_key_exists($value['id_ingredient'], $_SESSION['cart'][$id_truck]['ingredient']) !== false) {
                                    unset($_SESSION['cart'][$id_truck]['ingredient'][$value['id_ingredient']]);
                                }
                            } else {
                                $_SESSION['cart'][$id_truck]['ingredient'][$value['id_ingredient']]['quantity_ingredient'] = $value['quantity_ingredient']; // change quantity of menu
                            }
                        }
                        var_dump($_SESSION['cart'][$id_truck]);
                        break;
                    case 'drink':

                        foreach ($cart['drink'] as $value) {


                            if ($value['quantity_drink'] <= 0) {

                                if (array_key_exists($value['id_drink'], $_SESSION['cart'][$id_truck]['drink']) !== false) {
                                    unset($_SESSION['cart'][$id_truck]['drink'][$value['id_drink']]);
                                }
                            } else {
                                $_SESSION['cart'][$id_truck]['drink'][$value['id_drink']]['quantity_drink'] = $value['quantity_drink']; // change quantity of menu
                            }
                        }
                        var_dump($_SESSION['cart'][$id_truck]);
                        break;
                    default:
                        break;
                }
            }
        } else {
            switch ($_POST['item']) {
                case 'meal':

                    foreach ($cart as $value) {


                        if ($value['quantity_meal'] <= 0) {
                            if (array_key_exists($value['id_meal'], $_SESSION['cart'][$id_truck]['meal']) !== false) {
                                unset($_SESSION['cart'][$id_truck]['meal'][$value['id_meal']]);
                            }
                        } else {
                            $_SESSION['cart'][$id_truck]['meal'][$value['id_meal']]['quantity_meal'] = $value['quantity_meal']; // change quantity of meal
                        }
                    }
                    var_dump($_SESSION['cart'][$id_truck]);

                    break;
                case 'menu':

                    foreach ($cart as $value) {


                        if ($value['quantity_menu'] <= 0) {

                            if (array_key_exists($value['id_menu'], $_SESSION['cart'][$id_truck]['menu']) !== false) {
                                unset($_SESSION['cart'][$id_truck]['menu'][$value['id_menu']]);
                            }
                        } else {
                            $_SESSION['cart'][$id_truck]['menu'][$value['id_menu']]['quantity_menu'] = $value['quantity_menu']; // change quantity of menu
                        }
                    }
                    var_dump($_SESSION['cart'][$id_truck]);

                    break;
                case 'ingredient':

                    foreach ($cart as $value) {


                        if ($value['quantity_ingredient'] <= 0) {

                            if (array_key_exists($value['id_ingredient'], $_SESSION['cart'][$id_truck]['ingredient']) !== false) {
                                unset($_SESSION['cart'][$id_truck]['ingredient'][$value['id_ingredient']]);
                            }
                        } else {
                            $_SESSION['cart'][$id_truck]['ingredient'][$value['id_ingredient']]['quantity_ingredient'] = $value['quantity_ingredient']; // change quantity of menu
                        }
                    }
                    var_dump($_SESSION['cart'][$id_truck]);
                    break;
                case 'drink':

                    foreach ($cart as $value) {


                        if ($value['quantity_drink'] <= 0) {

                            if (array_key_exists($value['id_drink'], $_SESSION['cart'][$id_truck]['drink']) !== false) {
                                unset($_SESSION['cart'][$id_truck]['drink'][$value['id_drink']]);
                            }
                        } else {
                            $_SESSION['cart'][$id_truck]['drink'][$value['id_drink']]['quantity_drink'] = $value['quantity_drink']; // change quantity of menu
                        }
                    }
                    var_dump($_SESSION['cart'][$id_truck]);
                    break;
                default:
                    break;
            }
        }
    }

    private function deleteCartAction()
    {
        unset($_SESSION['cart']);
    }

}


