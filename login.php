<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <link rel="stylesheet" href="./signUP.css">
    <style>
        .form {
            width: 250px;
            height: 280px;
        }
    </style>
</head>

<body>
    <?php
    require('./connection.php');
    if (isset($_POST['login_button'])) {
        $_SESSION['validate'] = false;
        $name = $_POST['Name'];
        $password = $_POST['password'];
        $p = crud::connect()->prepare('SELECT * FROM crudtable WHERE name=:n and password=:p');
        $p->bindValue(':n', $name);
        $p->bindValue(':p', $password);
        $p->execute();
        $d = $p->fetchALL(PDO::FETCH_ASSOC);
        if ($p->rowCount() > 0) {
            $_SESSION['Name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['validate'] = true;
            header('location:users.php');
        } else {
            echo 'make sure that you are register';
        }
    }
    ?>

    <div class="form">
        <div class="title">
            <p>Login Form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="Name" placeholder=" Name">
            <input type="text" name="password" placeholder="Password">
            <input type="submit" value="Login" name="login_button">
        </form>
    </div>
</body>

</html>