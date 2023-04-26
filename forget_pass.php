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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if ($new_pass !== $confirm_pass) {
        $error[] = "New password and confirm password does not matches.";
    } else {
        $select = "SELECT * FROM `customer` WHERE `email` = '$email'";

        $result = mysqli_query($conn, $select);
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
            $to = '20bce107@nirmauni.ac.in';
            $subject = 'Password Changed';
            $message = 'The password of ' . $email . 'new password is now' . $new_pass . ".";
            $headers = 'From: 20bce101@nirmauni.ac.in';
            $new_pass = sqlPassword($new_pass);
            $query = "UPDATE `customer` SET `password`='$new_pass' WHERE `email`= '$email'";
            mysqli_query($conn, $query);
            mail($to, $subject, $message, $headers);
        } else {
            $error[] = "Account does not exists.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forget_password.css">
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
            <input type="email" name="email" required placeholder="enter your email"><br>
            <input type="email" name="new_password" required placeholder="enter new passwrod"><br>
            <input type="email" name="confirm_password" required placeholder="enter confirm password"><br>
            <button type="submit" name="submit">SUBMIT</button><br>
            <p> Don't have an account? <a href="register_form.php">Register Now</a> </p>
        </form>
    </div>
</body>

</html>