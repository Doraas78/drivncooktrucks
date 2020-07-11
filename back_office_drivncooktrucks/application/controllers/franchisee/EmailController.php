<?php


class EmailController extends Controller
{


    public function newslettersToCustomersAction()
    {
        $customerModel = new CustomerModel();
        $emails = $customerModel->getAllCustomersNewslettersAggreed();

        if($emails !== null || !empty($emails) )
        {

            $emails = implode(",", $emails);

            $to = $emails;
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $headers = 'From: perldecoco@gmail.com' . "\r\n" .
                'Reply-To: perldecoco@gmail.com' . "\r\n";

            if (mail($to, $subject, $message, $headers))
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);
            }
        }

    }
}