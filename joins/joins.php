<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "joins";


$conn = mysqli_connect($servername, $username, $password, $dbname);

echo "<h2>Inner Join</h2>";
$inner_query = "SELECT users.username, orders.product, orders.quantity FROM users INNER JOIN orders ON users.user_id = orders.user_id";

$inner_result = mysqli_query($conn, $inner_query);

if ($inner_result) 
{

    echo "<table  border='5' cellpadding='20'>";
    echo "<tr><th>Users</th><th>Product</th><th>Quantity</th></tr>";

   
    while ($row = mysqli_fetch_array($inner_result)) 
    {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} 

else 
{
   
    echo "Error: " . mysqli_error($conn);
}


//left join

echo "<h2>Left Join </h2>";

$left_query = "SELECT users.username , orders.product , orders.quantity FROM users LEFT JOIN orders ON users.user_id = orders.user_id";

$left_result = mysqli_query($conn , $left_query);

if ($left_result) 
{

    echo "<table border='5' cellpadding='20'>";
    echo "<tr><th>Users</th><th>Product</th><th>Quantity</th></tr>";

   
    while ($row = mysqli_fetch_array($left_result)) 
    {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }


    echo "</table>";
} 

else 
{
   
    echo "Error: " . mysqli_error($conn);
}


//right join


echo "<h2> Right Join </h2>";

$right_query = "SELECT users.username , orders.product , orders.quantity FROM users RIGHT JOIN orders ON users.user_id = orders.user_id";
$right_result = mysqli_query($conn , $right_query);

if ($right_result) 
{

    echo "<table border='5' cellpadding='20'>";
    echo "<tr><th>Users</th><th>Product</th><th>Quantity</th></tr>";

   
    while ($row = mysqli_fetch_array($right_result)) 
    {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} 

else 
{
   
    echo "Error: " . mysqli_error($conn);
}


//cross join
echo "<h2>Cross Join</h2>";

$cross_query = "SELECT users.username , orders.product , orders.quantity FROM users CROSS JOIN orders";
$cross_result = mysqli_query($conn , $cross_query);


if ($cross_result)
{

    echo "<table border='5' cellpadding='20'>";
    echo "<tr><th>Users</th><th>Product</th><th>Quantity</th></tr>";

   
    while ($row = mysqli_fetch_array($cross_result))
    {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} 

else 
{
   
    echo "Error: " . mysqli_error($conn);
}


mysqli_close($conn);


?>
