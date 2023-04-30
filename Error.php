<?php
@include 'config.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Error Page</title>
    <style>
        body {
            background-color: #606c88;
            color: #fff;
        }

        .container {
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            padding: 20px;
            margin: 100px auto;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            color: #4b5975;
            font-size: 36px;
            margin-top: 0;
        }

        /* p {
			font-size: 24px;
			margin: 20px 0;
		} */

        a {
            background-color: #23a9d5;
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            cursor: pointer;
        }

        a:hover {
            background-color: #4b5975;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Oops! Something went wrong.</h1>

        <a href="<?php if (!isset($_SESSION['email']) or !isset($_SESSION['admin_name']) and !isset($_SESSION['user_name'])) {
                        echo "login_form.php";
                    } else {
                        echo "user_page.php";
                    }
                    ?>">Try Again</a>
    </div>

</body>

</html>