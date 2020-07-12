<?php


class EventController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $this->data['active_event'] = 1;
        $this->render('franchisee.event', 'template_franchisee', $this->data);
    }
    public function addEventAction()
    {

        // check POST exist
        if( isset($_POST) && isset($_POST['begin_date']))
        {

            $array = form_null_to_NULL_key_value($_POST);

            $event = new EventModel();
            $truck = new TruckModel();
            $organization = new OrganizationModel();

            $valid_insert = $event->insertEvent($array);

            // check if insert well done
            if($valid_insert)
            {
                $lastInsertEventID = $event->getLastEvent();
                $truckID = $truck->getTruckByEmployeeHeadquarter();
                $data = array(
                    'id_event' => $lastInsertEventID,
                    'id_truck' => $truckID['id']
                );
                $organization->insertOrganization($data);

                echo json_encode(1);
            }
        }
    }

    public function getNumberGuestsEventAction(int $id)
    {
        $organizations = new EventModel();
        return $organizations->getCustomersCountEvent($id);
    }

    public function getAllValidEventsAction()
    {
        $organizations = new OrganizationModel();
        $data = $organizations->getValidOrganizations();

        foreach ($data as $key => $event)
        {
            $data[$key]['participation'] = $organizations->countRegisterEvent($event['id_event'])['count'];
        }

        $this->render_data($data);
    }

    public function getAllInvalidEventsAction()
    {
        $organizations = new OrganizationModel();
        $data = $organizations->getInvalidOrganizations();

        $this->render_data($data);
    }


    public function getMyEventsActionAndValidAction()
    {
        $organizationModel = new OrganizationModel();
        $data = $organizationModel->getMyOrganizationsActiveAndValid($_SESSION['user']['id_franchisee']);

        echo json_encode($data);
    }

    public function getMyEventsActionAndInvalidAction()
    {
        $organizationModel = new OrganizationModel();
        $data = $organizationModel->getMyOrganizationsActiveAndInvalid($_SESSION['user']['id_franchisee']);

        echo json_encode($data);
    }

}