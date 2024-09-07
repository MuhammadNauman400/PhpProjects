<?php

include 'connection.php';

$sql = "SELECT name, age, email FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
      
    </style>
</head>
<body>

<h2>Users</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
     
         while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
            }
       
        ?>
    </tbody>
</table>

<a href="index.php">Back</a>
</body>
</html>

<?php

$conn->close();
?>
