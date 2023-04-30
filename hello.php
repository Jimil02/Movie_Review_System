<!DOCTYPE html>
<html>

<head>
    <title>Movie Review Website</title>
    <style>
        body {

            background: #606c88;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right,
                    #606c88,
                    #3f4c6b);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right,
                    #606c88,
                    #3f4c6b);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            height: 100vh;
            font-family: "Montserrat", sans-serif;
            margin: 0px;
        }

        .main {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            /* margin-top: 15%;
            margin-bottom: 30%;
            margin-left: 35%;
            margin-right: 30%; */
            top: 50%;
            left: 30%;
            position: fixed;
        }

        .btns {
            margin: 1vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .login {
            float: right;
            background-color: #23a9d5;
            border: none;
            color: #fff;
            padding: 14px 16px;
            font-size: 17px;
            cursor: pointer;
            margin-right: 20px;
        }

        .register {
            float: right;
            background-color: #23a9d5;
            border: none;
            color: #fff;
            padding: 14px 16px;
            font-size: 17px;
            cursor: pointer;
            margin-right: 20px;
        }

        .login:hover,
        .register:hover {
            background-color: #AFD3E2;
            color: #fff;
            padding: 16px;
            border-radius: 25px;
        }

        #heading {
            color: #fff;
        }

        #black {
            color: black;
        }

        #text {
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- <div class="navbar">
	<a href="#">Home</a>
	<a href="#">About Us</a>
	<button class="register" onclick="location.href='register.php'">Register</button>
	<button class="login" onclick="location.href='login.php'">Login</button>
</div> -->

    <!-- <div class="image-container">
    <img class="image" src="image1.jpg" alt="Image 1">
    <img class="image" src="image2.jpg" alt="Image 2">
    <img class="image" src="image3.jpg" alt="Image 3">
</div> -->
    <div class="main">
        <div class="btns">
            <button class="register" onclick="location.href='register.php'">Register</button>
            <button class="login" onclick="location.href='login.php'">Login</button>
        </div>
        <div class="write-up">
            <h1 id='heading'>Welcome <span id="black">to</span> our website!</h1>

            <p id='text'>Here you can find lots of interesting content and cool movie reviews. Love to hear what you want to say</p>
        </div>
    </div>
</body>

</html>