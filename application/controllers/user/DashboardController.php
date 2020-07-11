<?php


class DashboardController extends Controller
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
        $this->render('user.dashboard', 'template_user', $this->data);
    }

    public function toOrderAction()
    {
        redirect('user', 'Orders', 'index');
    }

    public function profilAction()
    {
        redirect('user', 'Profil', 'index');
    }

    public function cartAction()
    {
        redirect('user', 'Cart', 'index');
    }

    public function eventAction()
    {
        redirect('user', 'Event', 'index');
    }

}