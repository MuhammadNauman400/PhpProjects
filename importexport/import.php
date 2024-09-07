<?php

include('connection.php');

if (isset($_POST['submit'])) {

    if ($_FILES['file']['name']) {
        $filename = $_FILES['file']['tmp_name'];
        $file = fopen($filename, "r");

        fgetcsv($file);


        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            $sql = "INSERT INTO users (name, age, email) VALUES ('$data[0]', '$data[1]', '$data[2]')";
            $conn->query($sql);
        }

        fclose($file);
        echo "CSV file successfully imported!";
    }
}

$conn->close();
?>
