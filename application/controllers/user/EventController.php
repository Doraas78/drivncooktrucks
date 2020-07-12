<?php


class EventController extends Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->data['active_event'] = 1;
    }
    public function indexAction() : void
    {
        $this->render('user.event', 'template_user', $this->data);
    }

    public function getAllValidEventAction()
    {
        $organizations = new OrganizationModel();
        $data = $organizations->getValidOrganizations();

        foreach ($data as $key => $event)
        {

            $participation = $organizations->getParticipationCustomer($_SESSION['customer']['email'], $event['id_event']);
            $data[$key]['participation'] = $participation;
        }

        $this->render_data($data);
    }

    public function cancelEventAction()
    {
        if(!isset($_GET['event_id']))
        {
            redirect('user', 'Event', 'index');
        }
        $organizations = new OrganizationModel();
        $organizations->dropParticipationCustomer($_SESSION['customer']['email'], (int)$_GET['event_id']);
        redirect('user', 'Event', 'index');

    }

    public function registerEventAction()
    {
        if(!isset($_GET['event_id']))
        {
            redirect('user', 'Event', 'index');
        }

        $organizations = new OrganizationModel();
        $data = $organizations->insertParticipationCustomerToEvent($_SESSION['customer']['email'], (int)$_GET['event_id']);
        redirect('user', 'Event', 'index');

    }

}
