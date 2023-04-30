<?php
@include 'config.php';
session_start();
if (!$_SESSION['email'] and !isset($_SESSION['admin_name'])) {
    // echo "Admin name not set";
    header('location:login_form.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1 id = 'heading'>Admin Dashboard</h1>
    <div class="main">
        <!-- <div class='static'> -->
        <div class='count_user'>
            <?php
            $count_of_users = 0;
            $query_count = "SELECT count(`email`) FROM `customer`;";
            $res = mysqli_query($conn, $query_count);
            $count_of_users_array = mysqli_fetch_array($res);
            if (!empty($count_of_users_array))
                $count_of_users = $count_of_users_array[0];

            echo $count_of_users;
            ?>
        </div>
        <div class='count_reviews'>
            <?php
            $count_of_review = 0;
            $query_review_count = "SELECT count(`review`) FROM `review_db`;";
            $res = mysqli_query($conn, $query_review_count);
            $count_of_review_array = mysqli_fetch_array($res);
            if (!empty($count_of_review_array))
                $count_of_review = $count_of_review_array[0];

            echo $count_of_review;
            ?>
        </div>
        <!-- </div> -->
        <div class='update'>
            <form action="" method="post">
                <input type="text" class='email_id' name='email_id_to_update' placeholder='enter email id to update'></input>
                <button type='submit' class='create_admin' id='to_admin' name='to_admin'>UPDATE</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_REQUEST['email_id_to_update']) and isset($_REQUEST['to_admin'])) {
                $email_id_ = $_REQUEST['email_id_to_update'];
                $check = "SELECT * FROM `customer` WHERE `email` = '$email_id_'; ";
                $check_row = mysqli_query($conn, $check);
                if (mysqli_num_rows($check_row) == 0) {
                    $error[] = 'user do not exists!';
                } else {
                    $admin = 'admin';
                    $query = "UPDATE `customer` SET `user_type` = '$admin' WHERE `email` = '$email_id_';";
                    mysqli_query($conn, $check);
                }
            }
            ?>
        </div>
        <div class="remove_user">
            <form action="" method="post">
                <input type="text" class='email_id' name='email_id_to_remove' placeholder='Enter email id to remove'></input>
                <button type='submit' class='create_admin' id='to_remove' name='to_remove'>REMOVE</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_REQUEST['email_id_to_remove']) and isset($_REQUEST['to_remove'])) {
                $email_id_ = $_REQUEST['email_id_to_remove'];
                $check = "SELECT * FROM `customer` WHERE `email` = '$email_id_'; ";
                $check_row = mysqli_query($conn, $check);
                if (mysqli_num_rows($check_row) == 0) {
                    $error[] = 'user do not exists!';
                } else {
                    $query = "DELETE FROM `customer` WHERE `email` = '$email_id_';;";
                    mysqli_query($conn, $query);
                }
                $check_review = "SELECT * FROM `review_db` WHERE `email` = '$email_id_'; ";
                $check_row = mysqli_query($conn, $check_review);
                if (mysqli_num_rows($check_row) > 0) {

                    $query = "DELETE FROM `review_db` WHERE `email` = '$email_id_';;";
                    mysqli_query($conn, $query);
                }
            }
            ?>
        </div>
    </div>

</body>

</html>