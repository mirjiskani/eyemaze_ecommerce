<?php
class errorController
{

    public function __construct()
    {
    }
    public function notfound()
    {
        include('views/error.php');
    }
}
