<?php
include 'connection.php';

class Users {
    private $con;

    public function __construct() {
        $db = new Database();
        $this->con = $db->con;
    }

    public function deleteUser($id) {
        $stmt = $this->con->prepare("DELETE FROM `user` WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

if (isset($_GET['id'])) {
    $user = new Users();
    $id = $_GET['id'];

    if ($user->deleteUser($id)) {
        header('Location: view.php');
        exit();
    } else {
        echo "Error deleting user.";
    }
}
?>
