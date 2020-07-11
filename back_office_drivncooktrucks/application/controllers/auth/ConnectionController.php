<?php

class ConnectionController extends Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = array();
    }

    public function indexAction()
    {
        $this->render('auth.connection', 'template_admin', $this->data);
    }
}
