<?php
    @include 'config.php';
    session_start();
    // echo $_SESSION['admin_name'];
    if(!isset($_SESSION['admin_name'])){
        header('location:login_form.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
    <h1>Hello Admin <span><?php echo $_SESSION['admin_name']?></span></h1>
    <a href="logout.php" class="btn">Logout</a>
</body>
</html>