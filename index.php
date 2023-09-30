<?php
include_once('authentication/auth.php');
include_once('constants/define.php');
class RouterClass
{
    const defaultController = 'home';
    private $grantedRoutes = ['login', 'register', 'admin'];
    private $uriSegments = array();
    public function __construct()
    {
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    //    unset($_SESSION['cart']);
        $this->uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    }
    // getAccess of a page
    public function getAccess()
    {
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        if ($url === BASEURL) {
            include('controller/' . self::defaultController . '.php');
            $controller = self::defaultController . 'Controller';
            $ob =  new $controller();
            $ob->index();
        } else {
            $auth = new auth();
            if (in_array($this->uriSegments[CONTROLLER], $this->grantedRoutes)) {
                include('controller/' . $this->uriSegments[CONTROLLER] . '.php');
                $controller = $this->uriSegments[CONTROLLER] . 'Controller';
                $ob =  new $controller();
                if (isset($this->uriSegments[FUNC])) {
                    $function =  $this->uriSegments[FUNC];
                    $ob->$function();
                } else {
                    $ob->index();
                }
            } else {

                include('controller/' . $this->uriSegments[CONTROLLER] . '.php');
                $controller = $this->uriSegments[CONTROLLER] . 'Controller';
                $ob =  new $controller();
                if (isset($this->uriSegments[FUNC])) {
                    $function =  $this->uriSegments[FUNC];
                    $ob->$function();
                } else {
                    $ob->index();
                }
            }
        }
    }
} //end of class

$router = new RouterClass();
$router->getAccess();
