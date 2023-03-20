<?php
    @include 'config.php';
    if(isset($_POST['submit'])){
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $fname= mysqli_real_escape_string($conn,$_POST['fname']);
        $lname= mysqli_real_escape_string($conn,$_POST['lname']);
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $select = "SELECT * FROM customer WHERE email = '$email' && password = '$pass'";

        $result = mysqli_query($conn,$select);

        if(mysqli_num_rows($result)>0){
            $error[] = 'user already exists!';
        }
        else{
            if($pass != $cpass){
                $error[] = 'password not matched!';
            }
            else{
                $insert = "INSERT INTO customer (password,first_name,last_name,email,user_type) VALUES('$pass','$fname','$lname','$email','$user_type')";
                mysqli_query($conn,$insert);
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
    <title>RegisterForm</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="text" name="fname" required placeholder="enter your first name">
            <input type="text" name="lname" required placeholder="enter your last name">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p> Already have an account? <a href="login_form.php">Login Now</a> </p>

            
            
        </form>
    </div>
</body>
</html>