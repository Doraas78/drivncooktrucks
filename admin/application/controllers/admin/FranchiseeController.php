<?php


class FranchiseeController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
    }

    public function indexAction()
    {
        $this->render('admin.franchiseeManagement', 'template_admin', $this->data);
    }

    public function franchiseeDetailsAction()
    {


        $this->render('admin.franchiseeManagement', 'template_admin', $this->data);
    }

    public function getAllFranchiseeAction()
    {
        $franchiseeModel = new FranchiseeModel();
        $data = $franchiseeModel->getFranchisees();

        $this->render_data($data);
    }

    public function getAllCity()
    {
        $cityModel = new CityModel();
        return $cityModel->getCities();
    }

    public function franchiseeDetailsViewAction()
    {

        $this->data['cities'] = $this->getAllCity();

        if(isset($_GET['id']) && !empty($_GET['id']) && is_int((int)$_GET['id']))
        {
            $franchiseeModel = new FranchiseeModel();
            $data = $franchiseeModel->getFranchiseeFullDetails($_GET['id']);
            if(sizeof($data) < 0) {
                $this->data['franchisee'] = 0;
                $this->render('admin.franchiseeDetails', 'template_admin', $this->data);
            }
            else{
                $this->data['franchisee'] = $data;
                $this->render('admin.franchiseeDetails', 'template_admin', $this->data);
            }
        }else{
            $this->errorAction();
        }
    }

    public function changeAddressTruckFranchiseeAction()
    {

        if(isset($_POST) && !empty($_POST)){
            $data = array(
                'type_of_road' => $_POST['type_of_road'],
                'street' => $_POST['street'],
                'number' => (int)$_POST['number'],
                'city' => (int)$_POST['city'],
                'id_address' => (int)$_POST['id_address']
            );

            $franchiseeModel = new FranchiseeModel();
            $data = $franchiseeModel->changeAddressTruck($data);

            if($data === false)
                echo json_encode(0);
            else if($data === true)
                echo json_encode(1);
        }

    }

    public function deleteFranchiseeAction()
    {

        $franchiseeModel = new FranchiseeModel();
        $franchiseeModel->deleteDrinkByFranchisee((int)$_GET['id']);
        $franchiseeModel->deleteIngredientByFranchisee((int)$_GET['id']);
        $franchiseeModel->deleteMealByFranchisee((int)$_GET['id']);
        $franchiseeModel->deleteMenuByFranchisee((int)$_GET['id']);
        $data = $franchiseeModel->deleteFranchisee('id', (int)$_GET['id']);

        if($data === false)
            echo json_encode(0);
        else if($data === true)
            echo json_encode(1);


        redirect('admin', 'Franchisee', 'index');
    }
}