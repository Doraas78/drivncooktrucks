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
        $event = new OrganizationModel();
        $this->data['news'] = $event->getOrganizations();


        $this->render('admin.dashboard', 'template_admin', $this->data);
    }

    public function franchiseeAction()
    {
        redirect('admin', 'Franchisee', 'index');
    }

    public function truckAction()
    {
        redirect('admin', 'Truck', 'index');
    }

    public function purchaseAction(){
        $this->render('admin.purchaseManagement', 'template_admin');
    }

    public function myFoodtruckAction(){
        redirect('admin', 'Truck', 'myFoodtruck');
    }

    public function profilAction(){
        redirect('admin', 'Profil', 'index');
    }

    public function eventAction(){
        redirect('admin', 'Event', 'index');
    }
}