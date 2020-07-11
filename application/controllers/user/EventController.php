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

        $this->render_data($data);
    }

}
