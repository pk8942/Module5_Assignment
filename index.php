<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
}

if ($_SESSION["role"] == "user") {
    header("Location: home_user.php");
}
elseif ($_SESSION["role"] == "admin") {
    header("Location: home_admin.php");
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
