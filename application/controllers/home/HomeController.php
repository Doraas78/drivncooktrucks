<?php

class HomeController extends Controller
{
    private $data;

    public function construct()
    {
        parent::construct();
        $this->data = [];
    }

    public function indexAction()
    {
        $this->data['active_welcome'] = 1;
        $this->render('home.welcome', 'template', $this->data );
    }

    public function connectionAction()
    {
        $this->render('home.connection', 'template_empty' );
    }

    public function signInAction()
    {
        $this->data['cities'] = $this->getAllCity();
        $this->render('home.signIn', 'template_empty' , $this->data);
    }

    public function aboutAction(){
        redirect('home', 'About', 'index');
    }

    public function getAllCity()
    {
        $cityModel = new CityModel();
        return $cityModel->getCities();
    }


}