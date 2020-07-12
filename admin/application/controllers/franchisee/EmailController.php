<?php


class EmailController extends Controller
{


    public function newslettersToCustomersAction()
    {
        $customerModel = new CustomerModel();
        $emails = $customerModel->getAllCustomersNewslettersAggreed();



        if($emails !== null || !empty($emails) )
        {
            $subject = $_POST['subject'];
            $content = $_POST['message'];
            $mailheader = "From: Driv'N Cook Trucks " . $_SESSION['name'] . " <no-reply@drivncooktrucks.com> \r\n";

            foreach ($emails as $email){
                mail($email['email'], $subject, $content, $mailheader);

            }

            echo json_encode(1);

        }else{
            echo json_encode(0);

        }

    }
}