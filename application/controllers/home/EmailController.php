<?php


class EmailController extends Controller
{
    private $data;

    public function construct()
    {
        parent::construct();
        $this->data = [];
    }

    public function aboutViewAction()
    {
        $this->data['active_about'] = 1;
        $this->render('home.about', 'template', $this->data);
    }

    public function sendAction(){

        //On récupère les champs saisis par l'utilisateur
        if (isset($_POST['name']))
            $name = $_POST['name'];
        if (isset($_POST['email']))
            $email = $_POST['email'];
        if (isset($_POST['message']))
            $message = $_POST['message'];
        if (isset($_POST['subject']))
            $subject = $_POST['subject'];

        $content="From: $name \n Email: $email \n Message: $message";
        $recipient = "drivncooktrucks@gmail.com";
        $mailheader = "From: Driv'N Cook Trucks <no-reply@drivncooktrucks.com> \r\n";


        mail($recipient, $subject, $content, $mailheader) or die("Error!");
        echo json_encode(1);

    }

}