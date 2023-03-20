<?php
    @include 'config.php';
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location:login_form.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
    <h1>Hello User <span><?php echo $_SESSION['user_name']?></span></h1>
    <a href="logout.php" class="btn">Logout</a>
</body>
</html>