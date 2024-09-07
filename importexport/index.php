<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import and Export CSV</title>
</head>
<body>
    <h2>Import and Export CSV Files</h2>

  
    <h3>Import CSV File</h3>
    <form action="import.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".csv" required>
        <button type="submit" name="submit">Import CSV</button>
    </form>

  
    <h3>Export CSV</h3>
    <a href="export.php">Download CSV</a>

    <h2>View Users</h2>
    <a href="show_users.php">Click here to view the users table</a>

</body>
</html>
