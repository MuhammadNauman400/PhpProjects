<?php
include "config.php";
$address = $area = $city = $country = $postalcode = "";

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $address = $row['address'];
        $area = $row['area'];
        $city = $row['city'];
        $country = $row['country'];
        $postalcode = $row['postalcode'];
    } else {
        echo "No record found for this user.";
        exit();
    }
} else {
    header('Location: view.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>View More Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container position-relative">
        <a class="btn btn-outline-warning btn-lg position-absolute end-0 mt-3 me-3" href="view.php">Back to All Users</a> <br><br>
        <h2> More Info!</h2> <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Adrress</th>
                    <th>Area</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Postal Code</th>
                </tr>
                </thead>
            <tbody>
               
                    <tr>
                         <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['area']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['postalcode']; ?></td>

                        </tr>
                
            </tbody>
        </table>
    </div>
</body>

</html>