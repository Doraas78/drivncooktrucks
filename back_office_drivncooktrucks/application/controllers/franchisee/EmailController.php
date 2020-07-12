<?php


class EmailController extends Controller
{


    public function newslettersToCustomersAction()
    {
        $customerModel = new CustomerModel();
        $emails = $customerModel->getAllCustomersNewslettersAggreed();

        var_dump($emails);

        if($emails !== null || !empty($emails) )
        {
            $emails = implode(",", $emails);

            var_dump($emails);

            /*$recipient = $emails;
            $subject = $_POST['subject'];
            $content = $_POST['message'];
            $mailheader = "From: Driv'N Cook Trucks " . $_SESSION['name'] . " <no-reply@drivncooktrucks.com> \r\n";

            mail($recipient, $subject, $content, $mailheader) or die("Error!");*/
            //echo json_encode(1);

        }else{
            echo json_encode(0);

        }

    }
}