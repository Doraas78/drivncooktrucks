<?php


class MyFoodtruckController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $this->data['active_my_foodtruck'] = 1;
        $this->render('franchisee.myFoodtruck', 'template_franchisee', $this->data);
    }
}