<?php
include 'connection.php';

class Users {
    private $con;

    public function __construct() {
        $db = new Database();
        $this->con = $db->con;
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM `user`";
        $result = $this->con->query($sql);
        return $result;
    }
}

$user = new Users();
$users = $user->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">User List</h1>
        <a class="btn btn-outline-info mb-4" href="form.php">Add New User</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $users->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a class="btn btn-outline-primary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                            <a class="btn btn-outline-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>&nbsp;
                           
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
