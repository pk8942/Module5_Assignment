<?php

$firstname = $_POST["firstname"] ?? "";
$lastname = $_POST["lastname"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? ""; 

$role = "user";
$edit = $_POST["edit"] ?? "";

?>
<html>
    <body>
    <tbody>
                <?php 
                $filename = "data/users.txt";
                $fp = fopen($filename,"r");
                $users = fgetcsv($fp);
                foreach ($users as  $user) : ?>
                    <tr>
                        <td><?php echo $user['role']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['firstname']; ?></td>
                        <td><?php echo $user['lastname']; ?></td>
                        <td>
                            <form method="POST">
                                <button type="submit" name="edit" value="<?php echo $email; ?>" class="btn btn-primary">Edit</button>
                                <button type="submit" name="delete" value="<?php echo $email; ?>" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

    </body>
</html>
