<?php
require('database/database.php');
trait dbObjInstance
{
    public $dbObj;
    public function __consturct()
    {
        $this->dbObj = new DBConnect();
        $this->dbObj->CreateConnection();
    }    
}
