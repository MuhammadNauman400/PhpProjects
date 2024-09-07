<?php

include('connection.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="export.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('name', 'age', 'email'));

$sql = "SELECT name, age, email FROM users";
$result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
    
fclose($output);
$conn->close();
?>
