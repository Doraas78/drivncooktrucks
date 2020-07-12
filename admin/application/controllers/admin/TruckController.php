<?php


class TruckController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
    }

    public function indexAction()
    {
        $this->render('admin.trucksManagement', 'template_admin', $this->data);
    }

    public function getTrucksFullAction()
    {
        $truckModel = new TruckModel();
        $data = $truckModel->getFullTrucks();

        $this->render_data($data);
    }

    public function truckDetailsViewAction()
    {
        $model = new TruckModel();
        $this->data['truck'] = $model->getTruckFullInfos((int)$_GET['id']);
        var_dump($this->data['truck']);
        $this->render('admin.truckDetails', 'template_admin', $this->data);

    }
}