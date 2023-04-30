<!-- <!DOCTYPE html>
<html>
<head>
	<title>PopcornProse</title>
	<style>
		body {
			background-color: #1b2028;
			color: #fff;
		}

		.navbar {
			background-color: #4b5975;
			overflow: hidden;
		}

		.navbar a {
			float: left;
			color: #fff;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.navbar a:hover {
			background-color: #23a9d5;
			color: #fff;
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

		.login:hover, .register:hover {
			background-color: #4b5975;
			color: #fff;
		}
	</style>
</head>
<body>

	<div class="navbar">
		<a href="hello.php">Home</a>
		<a href="#">About Us</a>
		<button class="register" onclick="location.href='register_form.php'">Register</button>
		<button class="login" onclick="location.href='login_form.php'">Login</button>
	</div>

	<h1>Welcome to our website!</h1>

	<p>Here you can find lots of interesting content and cool features.</p>

</body>
</html> -->

<!-- Test code 2 -->

<!-- <!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<style>
		body {
			background-color: #1b2028;
			color: #fff;
		}
		.navbar {
		background-color: #4b5975;
		overflow: hidden;
	}

	.navbar a {
		float: left;
		color: #fff;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 17px;
	}

	.navbar a:hover {
		background-color: #23a9d5;
		color: #fff;
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

	.login:hover, .register:hover {
		background-color: #4b5975;
		color: #fff;
	}
    
    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .image {
        margin: 20px;
        max-width: 200px;
        max-height: 200px;
    }
</style>
</head>
<body>
<div class="navbar">
	<a href="#">Home</a>
	<a href="#">About Us</a>
	<button class="register" onclick="location.href='register.php'">Register</button>
	<button class="login" onclick="location.href='login.php'">Login</button>
</div>

<div class="image-container">
    <img class="image" src="image1.jpg" alt="Image 1">
    <img class="image" src="image2.jpg" alt="Image 2">
    <img class="image" src="image3.jpg" alt="Image 3">
</div>

<h1>Welcome to my website!</h1>

<p>Here you can find lots of interesting content and cool features.</p>
</body>
</html>  -->

<!-- Test Code 3 -->

<!-- <!DOCTYPE html>
<html>
<head>
	<title>PopcornProse</title>
	<style>
		body {
			background-color: #1b2028;
			color: #fff;
			font-family: Arial, sans-serif;
			margin: 0;
		}

		.navbar {
			background-color: #4b5975;
			overflow: hidden;
		}

		.navbar a {
			float: left;
			color: #fff;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.navbar a:hover {
			background-color: #23a9d5;
			color: #fff;
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

		.login:hover, .register:hover {
			background-color: #4b5975;
			color: #fff;
		}

		.images-container {
			display: flex;
			overflow-x: scroll;
			scroll-snap-type: x mandatory;
			margin-top: 20px;
			padding-bottom: 20px;
		}
		.images-container::-webkit-scrollbar {
  			width: 10px;
		}

		.images-container::-webkit-scrollbar-track {
		  	background: #1b2028;
		}

		.images-container::-webkit-scrollbar-thumb {
			background-color: #4b5975;
 			border-radius: 5px;
		}

		.images-container::-webkit-scrollbar-thumb:hover {
  			background-color: #23a9d5;
		}

		.image {
			flex: 0 0 auto;
			width: 200px;
			height: 200px;
			margin-left: 20px;
			background-color: #23a9d5;
			border-radius: 10px;
			scroll-snap-align: center;
		}
	</style>
</head>
<body>

	<div class="navbar">
		<a href="#">Home</a>
		<a href="#">About Us</a>
		<button class="register" onclick="location.href='register_form.php'">Register</button>
		<button class="login" onclick="location.href='login_form.php'">Login</button>
	</div>
	<centre>
		<h1>PopcornProse</h1>
	</centre>
	<p>Here you can find lots of interesting content and cool features.</p>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function scrollImages() {
            $(".images-container").animate({
                scrollLeft: "+=200px"
            }, 1000, "linear", function() {
                if ($(this).scrollLeft() >= ($(this).find("img").width() - $(this).width())) {
                    $(this).animate({
                        scrollLeft: 0
                    }, 1000, "linear");
                }
                scrollImages();
            });
        }

        scrollImages();
    });
</script>

	<div class="images-container">
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
		<div class="image"></div>
	</div>

	

</body>
</html> -->


<!-- Test Code - 4 -->

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<style>
		body {
			background-color: #1b2028;
			color: #fff;
		}

		.navbar {
			background-color: #4b5975;
			overflow: hidden;
		}

		.navbar a {
			float: left;
			color: #fff;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.navbar a:hover {
			background-color: #23a9d5;
			color: #fff;
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

		.login:hover, .register:hover {
			background-color: #4b5975;
			color: #fff;
		}

		.images-container {
			width: 80%;
			height: 400px;
			margin: 20px auto;
			/* overflow: hidden; */
			position: relative;
		}

		.images-container img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			position: absolute;
			left: 0;
			top: 0;
			display: inline-block;
			animation: scroll 11s infinite linear;
		}

		@keyframes scroll {
			0% {
				transform: translateX(0%);
			}
			100% {
				transform: translateX(-200%);
			}
		}
	</style>
</head>
<body>

	<div class="navbar">
		<a href="#">Home</a>
		<a href="#">About Us</a>
		<button class="register" onclick="location.href='register_form.php'">Register</button>
		<button class="login" onclick="location.href='login_form.php'">Login</button>
	</div>

	<div class="images-container">
		<img src="pxfuel (1).jpg">
		<img src="pxfuel (2).jpg">
		<img src="pxfuel (3).jpg">
	</div>

	<h1>Welcome to my website!</h1>

	<p>Here you can find lots of interesting content and cool features.</p>

</body>
</html>

<!-- Test Code 5 -->
<!-- <!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
	<style>
		body {
			background-color: #1b2028;
			color: #fff;
		}

		.navbar {
			background-color: #4b5975;
			overflow: hidden;
		}

		.navbar a {
			float: left;
			color: #fff;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}

		.navbar a:hover {
			background-color: #23a9d5;
			color: #fff;
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

		.login:hover, .register:hover {
			background-color: #4b5975;
			color: #fff;
		}
        
        .images-container {
            height: 150px;
            width: 100%;
            overflow-x: scroll;
            overflow-y: hidden;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        
        .images-container img {
            height: 100%;
            display: inline-block;
            margin-right: 20px;
        }
        
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .images-container img:nth-child(even) {
            animation: scroll 5s infinite linear;
        }
        
        .images-container img:nth-child(odd) {
            animation: scroll 5s infinite linear 2.5s;
        }
	</style>
</head>
<body>

	<div class="navbar">
		<a href="#">Home</a>
		<a href="#">About Us</a>
		<button class="register" onclick="location.href='register.php'">Register</button>
		<button class="login" onclick="location.href='login.php'">Login</button>
	</div>

	<div class="images-container">
        <img src="https://via.placeholder.com/150x150.png?text=Image+1">
        <img src="https://via.placeholder.com/150x150.png?text=Image+2">
        <img src="https://via.placeholder.com/150x150.png?text=Image+3">
        <img src="https://via.placeholder.com/150x150.png?text=Image+4">
        <img src="https://via.placeholder.com/150x150.png?text=Image+5">
		<img src="https://via.placeholder.com/150x150.png?text=Image+1">
        <img src="https://via.placeholder.com/150x150.png?text=Image+2">
        <img src="https://via.placeholder.com/150x150.png?text=Image+3">
        <img src="https://via.placeholder.com/150x150.png?text=Image+4">
        <img src="https://via.placeholder.com/150x150.png?text=Image+5">
		<img src="https://via.placeholder.com/150x150.png?text=Image+1">
        <img src="https://via.placeholder.com/150x150.png?text=Image+2">
        <img src="https://via.placeholder.com/150x150.png?text=Image+3">
        <img src="https://via.placeholder.com/150x150.png?text=Image+4">
        <img src="https://via.placeholder.com/150x150.png?text=Image+5">
    </div>

	<h1>Welcome to my website!</h1>

	<p>Here you can find lots of interesting content and cool features.</p>

</body>
</html> -->
