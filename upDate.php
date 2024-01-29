<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpDate-Form</title>
    <link rel="stylesheet" href="./signUP.css">
</head>

<body>
    <?php

    require('./connection.php');
    if (isset($_POST['signUP_button'])) {
        $name = $_POST['Name'];
        $lastName = $_POST['Lastname'];
        $email = $_POST['Email'];
        $password = $_POST['password'];
        $confpassword = $_POST['confirmPassword'];
        if (!empty($name = $_POST['Name']) && !empty($_POST['Lastname']) && !empty($_POST['Email']) && !empty($_POST['password'])) {
            if ($password == $confpassword) {
                $p=crud::connect()->prepare('UPDATE crudtable SET name=:n,lastname=:l,email=:e,password=:p');
                $p->bindValue(':n', $name);
                $p->bindValue(':l', $lastName);
                $p->bindValue(':e', $email);
                $p->bindValue(':p', $password);
                $p->execute();
                echo 'Updated!';
            } else {
                echo 'password does not match!';
            }
        }
    }


    ?>
    <div class="form">
        <div class="title">
            <p>Update Form Form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="Name" placeholder=" Name">
            <input type="text" name="Lastname" placeholder=" Lastname">
            <input type="email" name="Email" placeholder=" Email">
            <input type="password" name="password" placeholder=" password">
            <input type="password" name="confirmPassword" placeholder=" confirm password">
            <input type="submit" value="UpDate" name="signUP_button">
        </form>
    </div>
</body>

</html>