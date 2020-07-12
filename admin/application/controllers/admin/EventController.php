<?php


class EventController extends Controller
{
    private $data;
    private $dataIsNull;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->dataIsNull = json_encode(array('isNull'));
    }

    public function indexAction() : void
    {
        $this->render('admin.event',    'template_admin');
    }

    public function getAllValidEventsAction()
    {
        $organizations = new OrganizationModel();
        $data = $organizations->getValidOrganizations();

        $this->render_data($data);
    }

    public function getAllInvalidEventsAction()
    {
        $organizations = new OrganizationModel();
        $data = $organizations->getInvalidOrganizations();

        $this->render_data($data);
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

            $valid_insert = $event->insertEvent($_POST);

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
                echo json_encode(true);
            }

        }else{
            echo json_encode(true);
        }
    }

    public function validateEventAction()
    {
        $eventModel = new EventModel();
        $eventModel->validateEvent((int)$_GET['id']);
        redirect('admin', 'Event', 'index');
    }

    public function deleteEventAction()
    {

        $eventModel = new EventModel();
        var_dump($eventModel->deleteEvent((int)$_GET['id']));
        redirect('admin', 'Event', 'index');
    }
}
