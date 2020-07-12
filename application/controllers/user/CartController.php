<?php

class CartController extends Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data['active_cart'] = 1;
    }

    public function indexAction()
    {
        $this->getCartItemsAction();
        $this->render('user.cart', 'template_user', $this->data);
    }

    public function getCartItemsAction()
    {

        if(isset($_SESSION['cart']) && !empty($_SESSION['cart']) )
        {
            $this->data['existCart'] = true;

            foreach($_SESSION['cart'] as $keyTruck => $valueTruck)
            {
                $truckModel = new TruckModel();
                $truck = $truckModel->getOneTruckFullAddressActive($keyTruck);
                $keyTruckId = 'truck' .  $truck['id_truck'];
                $cart[$keyTruckId] = $truck;

                foreach ($valueTruck as $keyCategoryFood => $valueCategoryFood)
                {
                    switch ($keyCategoryFood) {
                        case 'meal':

                            $cart[$keyTruckId]['meal'] = array();

                            foreach ($valueCategoryFood as $keyFood => $valueFood)
                            {

                                $franchiseeModel = new FranchiseeModel();
                                $meal = $franchiseeModel->getTableFRANCHISEE_MEALJoin((int)$cart[$keyTruckId]['id_franchisee'], (int)$keyFood);

                                $meal[0]['current_quantity_meal'] = $valueCategoryFood[$keyFood]['quantity_meal'];

                                array_push($cart[$keyTruckId]['meal'], $meal);
                            }
                            break;
                        case 'menu':
                            $cart[$keyTruckId]['menu'] = array();
                            foreach ($valueCategoryFood as $keyFood => $valueFood)
                            {
                                $franchiseeModel = new FranchiseeModel();
                                $menu = $franchiseeModel->getTableFRANCHISEE_MENUJoin((int)$cart[$keyTruckId]['id_franchisee'], (int)$keyFood);
                                $menu[0]['current_quantity_menu'] = $valueCategoryFood[$keyFood]['quantity_menu'];

                                array_push($cart[$keyTruckId]['menu'], $menu);
                            }
                            break;
                        case 'ingredient':
                            $cart[$keyTruckId]['ingredient'] = array();

                            foreach ($valueCategoryFood as $keyFood => $valueFood)
                            {
                                $franchiseeModel = new FranchiseeModel();
                                $ingredient = $franchiseeModel->getTableFRANCHISEE_INGREDIENTJoin((int)$cart[$keyTruckId]['id_franchisee'], (int)$keyFood);
                                $ingredient[0]['current_quantity_ingredient'] = $valueCategoryFood[$keyFood]['quantity_ingredient'];

                                array_push($cart[$keyTruckId]['ingredient'], $ingredient);
                            }
                            break;
                        case 'drink':
                            $cart[$keyTruckId]['drink'] = array();

                            foreach ($valueCategoryFood as $keyFood => $valueFood)
                            {
                                $franchiseeModel = new FranchiseeModel();
                                $drink = $franchiseeModel->getTableFRANCHISEE_DRINKJoin((int)$cart[$keyTruckId]['id_franchisee'], (int)$keyFood);
                                $drink[0]['current_quantity_drink'] = $valueCategoryFood[$keyFood]['quantity_drink'];

                                array_push($cart[$keyTruckId]['drink'], $drink);
                            }
                            break;
                        default:
                            break;
                    }

                }

                $this->data['cart'] = $cart;
            }
        }else
        {
            $this->data['existCart'] = false;
        }
    }

}