<?php


class AddressController extends Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllFrenchCityAction()
    {
        $cityModel = new CityModel();
        $data = $cityModel->getCities();

        $this->render_data($data);
    }




}