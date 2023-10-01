<?php
require('database/database.php');
class userModle
{
    private $dbObj;
    public function __construct()
    {
        $this->dbObj = new DBConnect();
        $this->dbObj->CreateConnection();
    }
    public function addUser()
    {
        $escap_fname = mysqli_real_escape_string($this->dbObj->con, $_POST['firstname']);
        $escap_lname = mysqli_real_escape_string($this->dbObj->con, $_POST['lastname']);
        $escap_email = mysqli_real_escape_string($this->dbObj->con, $_POST['email']);
        $escap_password = mysqli_real_escape_string($this->dbObj->con, $_POST['password']);
        $hash_passowrd = password_hash($escap_password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO eyemaze_ecommerce.users (`firstName`, `lastName`, `email`,`password`,`status`)
        VALUES ('" . $escap_fname  . "','" . $escap_lname . "','" . $escap_email . "','" . $hash_passowrd . "',1,2)";
        return $this->dbObj->query_exe($sql);
    }
    public function fetchAll()
    {
    }
    public function updateProfile()
    {
    }
    public function hasUser()
    {
        $escap_email = mysqli_real_escape_string($this->dbObj->con, $_POST['email']);
        $sql = "SELECT * FROM eyemaze_ecommerce.users WHERE `email` = '" . $escap_email . "' limit 1";
        return $this->dbObj->fetch_single($sql);
    }
    public function escaped_passowrd()
    {
        return mysqli_real_escape_string($this->dbObj->con, $_POST['password']);
    }
}
