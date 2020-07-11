<?php


class AboutController extends Controller
{
    private $data;

    public function construct()
    {
        parent::construct();
        $this->data = [];
    }

    public function indexAction()
    {
        $this->data['active_about'] = 1;
        $this->render('home.about', 'template', $this->data);
    }

    public function aboutAction(){
        redirect('home', 'About', 'index');
    }


}