<?php


class TruckController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
    }

    public function indexAction() : void
    {
        $this->showByPageAction();
    }

    private function getAllAction()
    {
        $trucks = new TruckModel();
    }

    public function showByPageAction()
    {
        $trucks = new TruckModel();
        $franchisees = new FranchiseeModel();
        $employees = new EmployeeModel();

        $limit = 10;

        if(isset($_GET['page']) && !empty($_GET['page'])) {
            $page = $_GET['page'];
        }else {
            $page = 1;
        }

        $this->data = array(
            'limit' => $limit,
            'begin' => ($page - 1) * $limit
        );

        $this->data['trucks'] = $trucks->getTruckByPage($this->data);

        // ASSIGN THE DIRECTOR OF THE TRUCK
        foreach ($this->data['trucks'] as &$truck)
        {
            $franchisee = $franchisees->getFranchiseeByKey('id_truck', $truck['id'], true);
            if($franchisees->getDirectorOfFranchisee($franchisee['id']) === false){
                $truck['directorOfFranchisee'] = false;
                $truck['test'] = false;
            }else{
                $truck['directorOfFranchisee'] = $franchisees->getDirectorOfFranchisee($franchisee['id']);
            }

        }

        $this->data['total_pages'] = ceil($this->data['trucks'][0]['total_row'] / $limit);
        $this->data['current_page'] = $page;

        $this->render('admin.trucksManagement', 'template', $this->data);
    }

    public function filterAction()
    {

        if(isset($_POST['string_search']) && !empty($_POST['string_search'])) {
            $filter = $_POST['string_search'];

            $this->indexAction();
        }
    }

    public function getProfilDirectorAction()
    {
        $this->indexAction();
    }

    public function myFoodtruckAction()
    {
        $this->render('admin.myFoodtruckIngredients', 'template', $this->data);
    }
}