<?php
    @include 'config.php';
    session_start();
    if(isset($_POST['submit'])){
        $email= mysqli_real_escape_string($conn,$_POST['email']);
        $fname= mysqli_real_escape_string($conn,$_POST['fname']);
        $lname= mysqli_real_escape_string($conn,$_POST['lname']);
        $pass = md5($_POST['password']);
        // $cpass = md5($_POST['cpassword']);
        $user_type = $_POST['user_type'];

        $select = "SELECT * FROM customer WHERE email = '$email' && password = '$pass' && user_type = '$user_type'";

        $result = mysqli_query($conn,$select);
        $rows = mysqli_num_rows($result);
        // $row = mysqli_fetch_array($result);
        // print_r($rows);
        if($rows > 0){
            $row = mysqli_fetch_array($result);
            print_r($row);
            if($row['user_type'] == 'admin'){
                $_SESSION['admin_name'] = $row['first_name'];
                header('location:admin_page.php');
            }
            elseif($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['first_name'];
                header('location:user_page.php');
            }
        }
        else{
            // echo $rows;
            $error[] = 'incorrect email or password!'; 
        }


    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <script id="sharer_iife_script" src="https://patelka2211.github.io/sharer/bundle/sharer.iife.min.js"></script><script id="sharer_button_script" src="https://patelka2211.github.io/sharer/bundle/sharer_button.min.js" type="text/javascript"></script>
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
            <input type="password" name="password" required placeholder="enter your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p> Don't have an account? <a href="register_form.php">Register Now</a> </p>
            <p> Forgot Password? <a href="forget_pass.php">Click Here</a> </p>
            
            
        </form>
    </div>
</body>
</html>