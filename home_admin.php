<?php
include_once("functions.php");
session_start();
$firstname = $_POST["firstname"] ?? "";
$lastname = $_POST["lastname"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? ""; 

$role = "user";
$deleteEmail = $_POST["delete"] ?? "";
$filename = "data/users.txt";
$fp = fopen($filename,"r");
$users = fgetcsv($fp);

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: login.php");
}
if (isset($_POST['edit'])) {

    $editEmail = $_POST['edit'];
    $encode = base64_encode($editEmail);
    header("Location: edit.php?email=$encode");
    exit();
}

if (isset($_POST['delete'])) {

    $deleteEmail = $_POST['delete'];
    if (isset($users[$deleteEmail])) {
        unset($users[$deleteEmail]);
        file_put_contents('data/users.json', json_encode($users, JSON_PRETTY_PRINT));
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
</head>
<body>
    <h1>Admin panel</h1>
    <h1>Welcome! <?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"];  ?></h1>
    <h2>Role: <?php echo $_SESSION["role"];  ?></h1>
     <h2>All data in the application </h2><br>

     <table data-toggle="table">
      <thead>
        <tr>
          <th>Role</th>
          <th>Email</th>
          <th>Password</th>
          <th>FirstName</th>
          <th>LastName</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $users[0]; ?></td>
          <td><?php echo $users[1]; ?></td>
          <td><?php echo $users[2]; ?></td>
          <td><?php echo $users[3]; ?></td>
          <td><?php echo $users[4]; ?></td>
        </tr>
      </tbody>
    </table>
     <?php 

      ?>
    <a href="logout.php">Logout</a>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
</body>
</html>