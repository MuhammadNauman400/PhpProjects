<?php
class Database {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect('localhost', 'root', '', 'all-users');
        if (mysqli_connect_error()) {
            echo mysqli_connect_error();
        } 
    }
}
?>
