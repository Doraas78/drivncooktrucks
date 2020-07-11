<?php


class FoodtrucksController extends Controller
{
    private $data;

    public function construct()
    {
        parent::construct();
        $this->data = [];
    }

    public function indexAction()
    {
        $this->getFoodTrucksFullAction();
        $this->data['active_foodtrucks'] = 1;
        $this->render('home.foodTrucks', 'template', $this->data);
    }
    public function foodtruckstAction(){
        redirect('home', 'Foodtrucks', 'index');
    }

    public function getFoodTrucksFullJsonAction()
    {
        $truckModel = new TruckModel();
        $data = $truckModel->getTrucksFullAddressActive();
        $this->render_data($data);
    }

    public function getFoodTrucksFullAction()
    {
        $truckModel = new TruckModel();
        $data = $truckModel->getTrucksFullAddressActive();
        $this->data["trucks"]= $data;
    }


}