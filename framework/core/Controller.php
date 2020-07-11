<?php

// Base Controller

class Controller{

    private $loader;
    private $template;
    private $dataIsNull;

    public function __construct()
    {
        $this->getUser();
        $this->dataIsNull = json_encode(array('isNull'));
        $this->loader = new Loader();
        $this->loader->helper('assets');
        $this->loader->helper('url');
        $this->loader->helper('general');
    }

    /**
     *  Call the view, sets the variables and sent it to the app
     *
     * @param String $nameView View to call
     * @param array $data
     * @param string $template
     * @return void
     */
    protected function render(String $nameView, string $template, array $data = [])
    {
        ob_start();

        extract($data);

        require VIEW_PATH . str_replace('.', '/', $nameView) . 'View.php';

        $content = ob_get_clean();

        require_once(VIEW_PATH . 'template/' . str_replace('.', '/', $template). '.php');
    }

    /**
     *  Call the view, sets the variables and sent it to the app
     *
     * @param String $nameView View to call
     * @param array $data
     * @param string $template
     * @return void
     */
    protected function render_error(String $nameView, string $template, array $data = [])
    {
        ob_start();

        extract($data);

        require VIEW_PATH . str_replace('.', '/', $nameView) . '.php';

        $content = ob_get_clean();

        require_once(VIEW_PATH . 'template/' . str_replace('.', '/', $template). '.php');
    }

    /**
     * Prohibits access to the page when the User is not Auth
     * @param void
     * @return void
     */
    protected function forbidden() : void{
        header('HTTP/1.0 403 forbidden');
        die('Accès interdit');
    }

    protected function render_data($data) {
        if($data === null)
        {
            echo $this->dataIsNull;

        } else {
            echo json_encode($data);
        }
    }

    public function errorAction()
    {
        $this->render_error('error', 'template_error');
    }

    protected function getUser()
    {
        if(isset($_SESSION['customer']) && $_SESSION['customer']) {
            $customer = new CustomerModel();
            $customer = $customer->getCustomerFull($_SESSION['customer']['email']);

            $_SESSION['customer'] = $customer;

        }
    }
}