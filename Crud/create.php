<?php include "config.php";
if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
    $type = $_POST['type'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postalcode = $_POST['postalcode'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `type`, 
    `address`, `area`, `city`, `country`, `postalcode`, `gender`) 
    VALUES ('$first_name','$last_name','$email','$hashedpassword', '$type', '$address','$area', 
    '$city', '$country', '$postalcode','$gender')";
    $result = $conn->query($sql);
    if ($result == TRUE) {

        header('location: view.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} ?>


<!DOCTYPE html>
<html>

<body>
    <h2>Create User</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>User Information:</legend>
            First name:<br> <input type="text" name="firstname"> <br>
            Last name:<br> <input type="text" name="lastname"> <br>
            Email:<br> <input type="email" name="email"> <br>
            Password:<br> <input type="password" name="password"> <br>
            Type:<br> <select  name="type" id="type">
                <option>Student</option>
                <option>Teacher</option>
            </select><br>
            Adrress:<br> <input type="text" name="address"> <br>
            Area:<br> <input type="text" name="area"> <br>
            City:<br> <input type="text" name="city"> <br>
            Country:<br> <input type="text" name="country"> <br>
            Postal Code:<br> <input type="number" name="postalcode"> <br>


            Gender:<br> <input type="radio" name="gender" value="Male">Male <input type="radio" name="gender" value="Female">Female <br><br>
            <input type="submit" name="submit" value="submit">

        </fieldset>
    </form>

</body>

</html>