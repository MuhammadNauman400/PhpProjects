<?php
include 'connection.php';

class Users {
    public $username = "";
    public $email = "";
    public $password = "";

    private $con;

    public function __construct() {
        $db = new Database();
        $this->con = $db->con;
    }

    public function addRecord($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

        $stmt = $this->con->prepare("INSERT INTO `user`(`username`, `email`,  `password`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->username, $this->email, $this->password);

        if ($stmt->execute()) {
            echo "Successfully added";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$user = new Users();

if (isset($_POST['submit'])) {
    $user->addRecord($_POST['username'], $_POST['email'], $_POST['password']);
    header('location: view.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <form action="" method="post">
        <h1>Add User</h1>
        Username: <br><input type="text" name="username" required><br>
        Email: <br><input type="email" name="email" required><br>
        Password: <br><input type="password" name="password" required><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>
