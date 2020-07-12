<?php


class Framework
{

    public static function run(){

        self::init();
        self::register();
        self::route();
    }

    // Initialization
    private static function init() {

        /* STATUS ORDER */
        define('WAIT', 1);
        define('IN_PROGRESS', 2);
        define('DONE', 3);

        // Define path constants root

        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", getcwd() . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\

        // Define path constants directory

        define("APP_PATH", ROOT . 'application' . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\application\

        define("FRAMEWORK_PATH", ROOT . "framework" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\framework\

        define("PUBLIC_PATH", ROOT . "public" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\public\

        define("CONFIG_PATH", APP_PATH . "config" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\application\config\

        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\application\controllers\

        define("MODEL_PATH", APP_PATH . "models" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\application\models\

        define("VIEW_PATH", APP_PATH . "views" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\application\views\

        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\framework\core\

        define('DB_PATH', FRAMEWORK_PATH . "database" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\framework\database\

        define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\framework\libraries\

        define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\framework\helpers\

        define("SERVICE_PATH", FRAMEWORK_PATH . "services" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\framework\services\

        define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS); // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\public\uploads

        // Define platform, controller, action, for example:
        // index.php?p=admin&c=Goods&a=add
        // index.php?p=home&c=Index

       /* if(isset($_SESSION))
            var_dump($_SESSION);*/


        /*echo 'customer exist : ';
        var_dump(($_SESSION['customer']));

        echo 'last_login_timestamp exist : ';
        var_dump(($_SESSION['last_login_timestamp']));*/


        /* check customer if exist  */
        if(isset($_SESSION['customer']) && $_SESSION['customer'] ) {

            /* check session timeout if exist */
            if(isset($_SESSION['last_login_timestamp']))
            {

                /* check session timeout if expired */
                if((time() - $_SESSION['last_login_timestamp']) > 100000000000000)// 900 seconds = 15 minutes * 60 secondes
                {
                    define("PLATFORM",  'auth');
                    define("CONTROLLER",'Auth');
                    define("ACTION", 'logout');
                } else
                {

                    $_SESSION['last_login_timestamp'] = time(); // reset time session

                    /* if customer is still log in */
                    if(isset($_GET['p']) && $_GET['p'] == 'auth')
                        define("PLATFORM", 'auth');
                    else
                        define("PLATFORM", 'user');

                    define("CONTROLLER", isset($_GET['c']) ? $_GET['c'] : 'Dashboard');
                    define("ACTION", isset($_GET['a']) ? $_GET['a'] : 'index');
                }
            } else {

                /* if customer not log anymore */
                define("PLATFORM",  'auth');
                define("CONTROLLER",'Auth');
                define("ACTION", 'logout');
            }
        }
        else
        {
            /* if try to get to customer platform but the customer is log out */
            if(isset($_GET['p']) && $_GET['p'] == 'user'){
                define("PLATFORM", 'home');
                define("CONTROLLER", 'Home');
                define("ACTION", 'connection');
            } else{
                define("PLATFORM",  isset($_GET['p']) ? $_GET['p'] : 'home');
                define("CONTROLLER", isset($_GET['c']) ? $_GET['c'] : 'Home');
                define("ACTION", isset($_GET['a']) ? $_GET['a'] : 'index');
            }
        }

        /*var_dump(PLATFORM);
        var_dump(CONTROLLER);
        var_dump(ACTION);*/

        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);  // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\application\controllers\home\
        define("CURR_VIEW_PATH", VIEW_PATH . PLATFORM . DS);  // D:\Coraline\Documents\www\projet_annuel\drive_n_cook_back_office\application\views\home\

        // Load core classes
        require CORE_PATH . "Loader.php";
        require DB_PATH . "DatabaseManager.php";
        require CORE_PATH . "Model.php";
        require CORE_PATH . "Controller.php";

        // Load configuration file
        $GLOBALS['config'] = include CONFIG_PATH . "config.php";

    }

    // Autoloading

    private static function register(){
        spl_autoload_register(array(__CLASS__,'autoload')); // function called for saving et create the autoloader
    }

    // Define a custom load method
    private static function autoload($classname){

        // Here simply autoload app’s controller and model classes
        if (substr($classname, -10) == "Controller"){

            // Controller
            if(file_exists(CURR_CONTROLLER_PATH . $classname . '.php'))
                require_once CURR_CONTROLLER_PATH . "$classname.php";
            else
                return false;

        } else if (substr($classname, -5) == "Model"){

            // Model
            if(file_exists(MODEL_PATH . $classname . '.php'))
                require_once  MODEL_PATH . "$classname.php";
            else
                return false;
        }
        return false;
    }

    // Routing and dispatching
    private static function route(){

        // Instantiate the controller class and call its action method
        $controllerName = ucfirst(CONTROLLER ). "Controller";
        $actionName = ACTION . "Action";
        $platform = $_SERVER['DOCUMENT_ROOT'] .  str_replace('index.php', '', $_SERVER['PHP_SELF']) . 'application/controllers/' . PLATFORM .  '/' . $controllerName . '.php';

       /* var_dump($controllerName);
        var_dump($actionName);
        var_dump(PLATFORM);*/

        if( file_exists($platform) && class_exists($controllerName, true) && method_exists($controllerName, $actionName)){

            $controller = new $controllerName;
            $controller->$actionName();
        }
        else
        {
            $controller = new Controller();
            $controller->errorAction();
        }
    }
}