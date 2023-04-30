<?php
@include 'config.php';
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

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $pass =  sqlPassword(mysqli_real_escape_string($conn, $_POST['password']));
    $cpass = sqlPassword(mysqli_real_escape_string($conn, $_POST['cpassword']));

    // $user_type = $_POST['user_type'];
    $user_type = "user";

    $select = "SELECT * FROM customer WHERE email = '$email'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO customer (`first_name`,`last_name`,`email`,`password`,`user_type`,`timestamp`) VALUES('$fname','$lname','$email','$pass','$user_type', CURRENT_TIMESTAMP())";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <link rel="stylesheet" href="register_style.css">
</head>

<body>
    <div class="navbar">
        <a href="hello.php">Home</a>
        <a href="#">About Us</a>
    </div>
    <div class="form-container">
        <form action="" method="post">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="enter your email"><br>
            <input type="text" name="fname" required placeholder="enter your first name"><br>
            <input type="text" name="lname" required placeholder="enter your last name"><br>
            <input type="password" name="password" required placeholder="enter your password"><br>
            <input type="password" name="cpassword" required placeholder="confirm your password"><br>
            <!-- <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select> -->
            <input type="submit" name="submit" value="register now"><br>
            <p> Already have an account? <a href="login_form.php">Login Now</a> </p>



        </form>
    </div>
</body>

</html>