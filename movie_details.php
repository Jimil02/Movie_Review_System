<?php
@include 'config.php';
session_start();

$api_key = "26e38e2d66msh27d3bcdcbff0f2bp175b17jsn28039fad29f3";

if (!isset($_SESSION['email']) or !isset($_SESSION['admin_name']) and !isset($_SESSION['user_name'])) {
    // echo "Admin name not set";
    header('location:login_form.php');
}
if (!isset($_GET['id'])) {
    header('location:user_page.php');
}

if ($_SERVER['REQUEST_METHOD'] != 'POST' and isset($_POST['user_review']) and isset($_POST['review_submit'])) {
    // unset($_POST['user_review']);
    // unset($_POST['review_submit']);

    echo $_POST['user_review'];
    echo $_POST['review_submit'];
}

$review_open = 0;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="movie_details.css">

    <title>Movies Details</title>
</head>

<body>
    <div class="navbar">
        <!-- <a href="hello.php">Home</a>
        <a href="#">About Us</a> -->
        <button class="logout" onclick="location.href='logout.php'">Logout</button>
    </div>
    <div class="wrapper">

        <div class="sidebar">
            <!-- <h1>Movie<br>Review</h1> -->
            <!-- <a href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a> -->
            <div>
                <form class="side-content" action="" method="post">
                    <input type="text" name="search" id="search" placeholder="search movies...">
                    <button type="submit" id="search-btn" name="sbtn">
                        <image id="search-img" src="search_image.png" alt="?">
                    </button>
                </form>
            </div>
            <?php
            if (isset($_POST['sbtn']) and isset($_POST['search'])) {
                // echo $_POST['search'];
                $curl = curl_init();
                $movie_name = $_POST['search'];

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/auto-complete?q=" . $movie_name,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
                        "X-RapidAPI-Key: " . $api_key,
                        // "X-RapidAPI-Key: 2b4d92d6c0msh9b1c872d5192902p1e833djsn347bed5ffa67",
                        // "content-type: application/octet-stream"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                $movie = [];

                if ($err) {
                    // echo "cURL Error #:" . $err;
                    header('location:Error.php');
                } else {
                    // echo "<section class='section1'><p>" . $response . "</p></section>";
                    $result = json_decode($response, true);
                    // $movie_data = [];
                    // echo "<form action='' method='post'>"
                    if (array_key_exists("d", $result)) {
                        foreach ($result["d"] as $key => $val) {
                            if (array_key_exists("i", $val) and array_key_exists("id", $val) and array_key_exists("l", $val)) {
                                // print_r($key . " :: " . $val);
                                // if (is_array($val)) {
                                //     foreach ($val as $k => $v)
                                //         print_r($k . " :: " . $v . " ");

                                //     echo "<br>";
                                // }

                                $id = $val["id"];
                                $movie_name = $val["l"];

                                $img_url = $val["i"]["imageUrl"];
                                $details = array($id => array("name" => $movie_name, "url" => $img_url));
                                array_push($movie, $details);
                                // <p>id = '$id'</p><br>
                                // echo "<div class='api-val'>";
                                // echo "
                                // <image src='$img_url' alt='?' class='img-api'></image><br>
                                // ";
                                // echo "<input type='submit' id=$id value=$movie_name>";
                                // echo "<button type='submit' name='mname' id = '$id' >$movie_name</button><br>";
                                echo "<a class='searched_res' href='movie_details.php?id=$id'>$movie_name</a><br>";
                                // echo "</div>";
                            }
                        }
                    }
                    // echo "</form>";
                }
            }
            ?>
        </div>

        <div class="content">
            <!-- <section>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos fugiat porro aliquam vitae adipisci soluta optio illum sunt nobis eum ducimus doloremque maxime enim provident deserunt possimus suscipit nesciunt incidunt, doloribus maiores, harum aliquid. Debitis hic voluptatem obcaecati harum odio quisquam consequuntur fuga sapiente. Possimus eius id quisquam. Soluta nostrum quam, corrupti deleniti in quidem consectetur impedit magnam mollitia perferendis esse nihil quisquam vero incidunt aut illo, neque blanditiis iusto fugiat eos iure rerum fugit laborum? Perspiciatis ea nihil reprehenderit quidem odit, aspernatur quas minus incidunt ducimus doloremque ratione provident officia atque! Libero accusamus velit aperiam autem fuga explicabo atque. Repellat dolorem magnam aliquam totam reprehenderit eveniet laudantium perspiciatis similique nesciunt sapiente in, excepturi consequatur, blanditiis, saepe ipsa sunt neque recusandae corrupti praesentium odio adipisci exercitationem sed! Dolore dolor ratione a adipisci commodi suscipit impedit esse quam, beatae eaque minus. Numquam at necessitatibus ex cumque hic, mollitia officia quisquam, ad dolorum, magni autem corporis soluta repudiandae illo! Vel quia hic sint vero ducimus blanditiis quaerat nesciunt unde illum recusandae? Dolorem velit quod tenetur inventore praesentium aut voluptatum similique, accusantium expedita autem suscipit totam voluptas illum temporibus eveniet esse quo veniam nihil vel quae ipsam debitis voluptatibus repellat. Distinctio, accusamus harum?
        </p>
    </section> -->

            <?php
            if (isset($_GET['id'])) {
                // echo $_GET['id'] . "<br>";
                $id = $_GET['id'];
                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/title/get-details?tconst=" . $id,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
                        "X-RapidAPI-Key: " . $api_key,
                        // "X-RapidAPI-Key: 2b4d92d6c0msh9b1c872d5192902p1e833djsn347bed5ffa67",
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                $result = json_decode($response, true);

                if ($err) {
                    // echo "cURL Error #:" . $err;
                    header('location:Error.php');
                } else {
                    // foreach($result as $key => $val)
                    // {
                    //     print_r($key . " :: " . $val);
                    //     if (is_array($val)) {
                    //         foreach ($val as $k => $v)
                    //             print_r($k . " :: " . $v . " ");

                    //         echo "<br>";
                    //     }
                    // }
                    global $movie;
                    global $movie_details;
                    $movie_details['id'] = $id;
                    $movie_details['Name'] = $result['title'];
                    // $movie_details['img'] = $result['url'];
                    if (array_key_exists('titleType', $result)) {
                        $movie_details["Title-Type"] = $result['titleType'];
                    }
                    if (array_key_exists('year', $result)) {
                        $movie_details["Year"] = $result['year'];
                    }
                    if (array_key_exists('numberOfEpisodes', $result))
                        $movie_details["Episodes"] = $result['numberOfEpisodes'];

                    echo "<div class='api-val'>";
                    if (array_key_exists('image', $result)) {
                        if (array_key_exists('url', $result['image'])) {
                            $img = $result['image']['url'];
                            echo "
                        <image src= $img alt='?' class='img-api'></image><br>
                        ";
                        }
                    }
                    echo "<table id = 'details'>";
                    foreach ($movie_details as $key => $val) {
                        if ($key == 'id')  continue;
                        echo "<tr><td><h2 id='detail_key'>$key</h2></td><td><h2>$val</h2></td><tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }
            }
            ?>
            <!-- <?php
                    // echo 'movie_details.php?id=' . $_GET['id']; 
                    ?> -->
            <div class='review'>

                <form action='' method='post'>
                    <div id='review_msg'>
                        <textarea rows=15 cols=27 id='ur' name='user_review'></textarea>
                        <div id='buttons'>
                            <button type='submit' name='review_submit' id='review-btn'>SUBMIT</button>
                            <!-- <button type='submit' name='up_submit' id='review-up-btn'>UPDATE</button> -->
                        </div>
                    </div>
                </form>
                <div id='<?php if ($review_open == 1) echo "previous_review" ?>'>
                    <?php

                    $query = "SELECT * FROM `review_db` WHERE `id` = '$id'";
                    $result = mysqli_query($conn, $query);
                    // $res = mysqli_fetch_array($result);
                    $num_of_rows = mysqli_num_rows($result);
                    // var_dump($res);
                    if ($num_of_rows > 0) {
                        $review_open = 1;
                        while ($res = mysqli_fetch_assoc($result)) {

                            $review = $res['review'];
                            $email = $res['email'];
                            $time = $res['timestamp'];

                            echo "<div id='display'>";
                            echo "<h4 class='top'>" . $email . "</h4>";
                            echo "<h4 class='top'>" . $time . "</h4>";
                            echo "<p class='main-review'>" . $review . "</p>";
                            echo "</div>";
                        }
                    } else
                        $review_open = 0;


                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (!empty($_REQUEST['user_review']) and isset($_POST['user_review']) and isset($_POST['review_submit'])) {
                            // echo "clicked!";
                            $id = $_GET['id'];
                            $email = $_SESSION['email'];
                            $new_review = $_POST['user_review'];
                            $query = "INSERT INTO `review_db` (`id`, `email`, `review`, `timestamp`) 
                                VALUES ('$id','$email','$new_review',CURRENT_TIMESTAMP());";
                            try {
                                mysqli_query($conn, $query);
                            } catch (Exception $e) {
                                // echo 'Message: ' . $e->getMessage();
                            }

                            if (isset($_POST['user_review'])) {
                                unset($_POST['user_review']);
                                // echo "unset";
                            }
                            if (isset($_POST['review_submit'])) {
                                unset($_POST['review_submit']);
                                // echo "unset1";
                            }
                            // header('location:movie_details.php');
                        }
                    }
                    ?>
                </div>
                <?php

                // if (isset($__POST['$user_review']) and isset($__POST['up_submit'])) {
                //     $query = "UPDATE `review_db` SET `id`='$id',`email`='$email',`review`='$review',`timestamp`=CURRENT_TIMESTAMP() WHERE 1;";
                //     mysqli_query($conn, $query);
                // }
                ?>
            </div>
        </div>
    </div>
</body>

</html>