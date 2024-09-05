<?php include "config.php";
$sql = "SELECT * FROM users";
$result = $conn->query($sql); ?>
<!DOCTYPE html>
<html>

<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container position-relative">
        <a class="btn btn-outline-info btn-lg position-absolute end-0 mt-3 me-3" href="create.php">Add New User</a> <br><br>
        <h2> All Users!</h2> <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <!-- <th>Type</th> -->
                    <!-- <th>Adrress</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Postal Code</th> -->
                    <!-- <th>Gender</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td> <?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <!-- <td><?php echo $row['type']; ?></td>
                      
                        <td><?php echo $row['gender']; ?></td> -->
                        <td><a class="btn btn-outline-primary" href="update.php?id=<?php echo $row['id']; ?>">
                                Edit</a>&nbsp;<a class=" btn btn-outline-danger" href="delete.php?id=<?php echo $row['id']; ?>">
                                Delete</a>&nbsp;<a class=" btn btn-outline-success" href="viewmore.php?id=<?php echo $row['id']; ?>">
                                View More</a></td>
                    </tr>
                <?php
                }


                ?>
            </tbody>
        </table>
    </div>
</body>

</html>