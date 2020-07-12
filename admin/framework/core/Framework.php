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

        /* ROUTE AND SESSION */

        /* if someone is connected */
        if(isset($_SESSION['user']) && $_SESSION['user']) {

            /* if session exist */
            if(isset($_SESSION['last_login_timestamp']))
            {

                /* if session timeout is not expired */
                if((time() - $_SESSION['last_login_timestamp']) < 100000000000000) // 900 seconds = 15 minutes * 60 secondes
                {

                    $_SESSION['last_login_timestamp'] = time(); // reset time session

                    /* if user is admin  */
                    if($_SESSION['user']['admin']){

                        if(isset($_GET['p']) && $_GET['p'] == 'auth')
                            define("PLATFORM", 'auth');
                        else
                            define("PLATFORM", 'admin');

                        define("CONTROLLER", isset($_GET['c']) ? $_GET['c'] : 'Home');
                        define("ACTION", isset($_GET['a']) ? $_GET['a'] : 'index');

                    }
                    /* if user is franchisee */
                    else{

                        if(isset($_GET['p']) && $_GET['p'] == 'auth')
                            define("PLATFORM", 'auth');
                        else
                            define("PLATFORM", 'franchisee');

                        define("CONTROLLER", isset($_GET['c']) ? $_GET['c'] : 'Home');
                        define("ACTION", isset($_GET['a']) ? $_GET['a'] : 'index');

                    }
                }
                else{

                    define("PLATFORM",  'auth');
                    define("CONTROLLER",'Connection');
                    define("ACTION", 'index');

                }
            } else{

                define("PLATFORM",  'auth');
                define("CONTROLLER",'Connection');
                define("ACTION", 'index');
            }
        }
        else
        {
            define("PLATFORM",  'auth');
            define("CONTROLLER",isset($_GET['c']) ? $_GET['c'] : 'Connection');
            define("ACTION", isset($_GET['a']) ? $_GET['a'] : 'index');
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