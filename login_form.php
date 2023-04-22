<?php
@include 'config.php';
session_start();
function sqlPassword($input)
{
    $pass = strtoupper(
        sha1(
            sha1($input, true)
        )
    );
    $pass = '*' . $pass;
    return $pass;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<h1>Here I am <h1>";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    // $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $pass = sqlPassword($_POST['password']);
    // $cpass = md5($_POST['cpassword']);
    // $user_type = $_POST['user_type'];

    $select = "SELECT * FROM `customer` WHERE `email` = '$email' && `password` = '$pass'";
    $result = mysqli_query($conn, $select);
    $rows = mysqli_num_rows($result);

    // $row = mysqli_fetch_array($result);
    print_r($rows);
    if ($rows > 0) {
        $row = mysqli_fetch_array($result);
        $user_tyoe_query = "SELECT `user_type` FROM `cutomer` WHERE `email` = '$email'";
        $user_type_result = mysqli_query($conn, $user_tyoe_query);
        $user_type_array = mysqli_fetch_assoc($user_type_result);
        $user_type = $user_type_array['user_type'];
        echo "<h1>" . $user_type . "<h1>";
        print_r($row);
        if ($user_type == 'admin') {
            $_SESSION['admin_name'] = $row['first_name'];
            header('location:admin_page.php');
        } elseif ($user_type == 'user') {
            $_SESSION['user_name'] = $row['first_name'];
            header('location:user_page.php');
        }
    } else {
        // echo $rows;
        $error[] = 'incorrect email or password!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login_style.css">
    <script id="sharer_iife_script" src="https://patelka2211.github.io/sharer/bundle/sharer.iife.min.js"></script>
    <script id="sharer_button_script" src="https://patelka2211.github.io/sharer/bundle/sharer_button.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <!-- <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p> Don't have an account? <a href="register_form.php">Register Now</a> </p>
            <p> Forgot Password? <a href="forget_pass.php">Click Here</a> </p> -->

            <p>Welcome</p>
            <input type="email" name="email" placeholder="Email" requied><br>
            <input type="password" name="password" placeholder="Password" requied><br>
            <input type="button" name="submit" value="Sign in"><br>
            <a href="forget_pass.php">Forgot Password?</a>
            <a href="register_form.php">Register Now</a>

            <div class="drops">
                <div class="drop drop-1"></div>
                <div class="drop drop-2"></div>
                <div class="drop drop-3"></div>
                <div class="drop drop-4"></div>
                <!-- <div class="drop drop-5"></div> -->
            </div>
        </form>
    </div>
</body>

</html>