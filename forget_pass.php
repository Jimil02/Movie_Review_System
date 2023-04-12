<?php
@include 'config.php';
if(isset($_POST['submit'])){
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $user_type = mysqli_real_escape_string($conn,$_POST['user_type']);

    $select = "SELECT * FROM customer WHERE email = '$email' && user_type = '$user_type'";
    
    $result = mysqli_query($conn,$select);
    $rows = mysqli_num_rows($result);
    if($rows>0){
        $to = '20bce101@nirmauni.ac.in';
        $subject = 'Nirma Sucks';
        $message ='This is first php mail.';
        $headers = 'From: 20bce107@nirmauni.ac.in';
        mail($to,$subject,$message,$headers);        
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
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="Enter" class="form-btn">
            <p> Don't have an account? <a href="register_form.php">Register Now</a> </p>
            
            
        </form>
    </div>
</body>
</html>