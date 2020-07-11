<?php


class FranchiseeController extends Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
    }


    private function getAllAction()
    {
        $franchisees = new FranchiseeModel();
    }

    public function indexAction() : void
    {

        $this->showByPageAction();
    }

    public function showByPageAction()
    {
        $franchisee = new FranchiseeModel();
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

        $this->data['franchisees'] = $franchisee->getFranchiseeByPage($this->data);

        $this->data['total_pages'] = ceil($this->data['franchisees'][0]['total_row'] / $limit);
        $this->data['current_page'] = $page;

        $this->render('admin.franchiseeManagement', 'template', $this->data);
    }

    public function filterAction()
    {

        if(isset($_POST['string_search']) && !empty($_POST['string_search'])) {
            $filter = $_POST['string_search'];

            $this->indexAction();
        }
    }

}