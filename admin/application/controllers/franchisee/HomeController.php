<?php

class HomeController extends Controller
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
        $this->render('franchisee.dashboard', 'template_franchisee', $this->data);
    }

    public function eventAction()
    {
        redirect('franchisee', 'Event', 'index');
    }

    public function myFoodtruckAction()
    {
        redirect('franchisee', 'MyFoodtruck', 'index');
    }
}