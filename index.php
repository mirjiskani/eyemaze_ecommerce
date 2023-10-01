<?php
include_once('authentication/auth.php');
include_once('constants/define.php');
include('controller/error.php');

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
        // unset($_SESSION['userdata']);
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
                if (file_exists('controller/' . $this->uriSegments[CONTROLLER] . '.php')) {
                    include('controller/' . $this->uriSegments[CONTROLLER] . '.php');
                    $controller = $this->uriSegments[CONTROLLER] . 'Controller';
                    $ob =  new $controller();
                    if (isset($this->uriSegments[FUNC]) && $this->uriSegments[FUNC] != '') {
                        if (!method_exists($ob, '' . $this->uriSegments[FUNC] . '')) {
                            $errob =  new errorController();
                            $errob->notfound();
                        }
                        $function =  $this->uriSegments[FUNC];
                        $ob->$function();
                    } else {
                        $ob->index();
                    }
                } else {
                    $ob =  new errorController();
                    $ob->notfound();
                }
            } else {
                try {
                    if (file_exists('controller/' . $this->uriSegments[CONTROLLER] . '.php')) {
                        include('controller/' . $this->uriSegments[CONTROLLER] . '.php');
                        $controller = $this->uriSegments[CONTROLLER] . 'Controller';
                        $ob =  new $controller();
                        if (isset($this->uriSegments[FUNC]) && $this->uriSegments[FUNC] != '') {
                            if (!method_exists($ob, '' . $this->uriSegments[FUNC] . '')) {
                                $errob =  new errorController();
                                $errob->notfound();
                            }
                            $function =  $this->uriSegments[FUNC];
                            $ob->$function();
                        } else {
                            $ob->index();
                        }
                    } else {
                        $errob =  new errorController();
                        $errob->notfound();
                    }
                } catch (\Throwable $th) {
                    $errob =  new errorController();
                    $errob->notfound();
                }
            }
        }
    }
} //end of class

$router = new RouterClass();
$router->getAccess();
