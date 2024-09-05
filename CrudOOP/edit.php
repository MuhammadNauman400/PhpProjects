<?php
include 'connection.php';

class Users {
    private $con;

    public function __construct() {
        $db = new Database();
        $this->con = $db->con;
    }

    public function getUserById($id) {
        $stmt = $this->con->prepare("SELECT * FROM `user` WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUser($id, $username, $email) {
        $stmt = $this->con->prepare("UPDATE `user` SET `username` = ?, `email` = ? WHERE `id` = ?");
        $stmt->bind_param("ssi", $username, $email, $id);
        return $stmt->execute();
    }
}

$user = new Users();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userData = $user->getUserById($id);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    if ($user->updateUser($id, $username, $email)) {
        header('Location: view.php');
        exit();
    } else {
        echo "Error updating user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Edit User</h1>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $userData['id']; ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $userData['username']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $userData['email']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update User</button>
        </form>
    </div>
</body>

</html>
