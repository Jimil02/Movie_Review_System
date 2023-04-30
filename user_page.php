<?php
@include 'config.php';
session_start();
if (!$_SESSION['email'] and !isset($_SESSION['admin_name']) and !isset($_SESSION['user_name'])) {
    // echo "Admin name not set";
    header('location:login_form.php');
}

$movie_details = array();

// global $api_key;
$api_key = "26e38e2d66msh27d3bcdcbff0f2bp175b17jsn28039fad29f3";

function get_movie_details($id)
{
    global $api_key;
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/title/get-details?tconst=" . $id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
            "X-RapidAPI-Key: " . $api_key,
            // "X-RapidAPI-Key: 69873a52f7msh3240d2bfcfdb944p17f775jsn01d66f73575c",
            // "content-type: application/octet-stream"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        // echo "cURL Error #:" . $err;
        header('location:Error.php');
    } else {
        // echo $response;
        $res = json_decode($response, true);
        return $res;
    }
}

/***
 * This function gives the popular movie's id as per the given Genre
 */
function getgenre($genre)
{
    // var_dump($genre);
    global $api_key;
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/title/v2/get-popular-movies-by-genre?genre=" . $genre . "&limit=30",
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

    if ($err) {
        // echo "cURL Error #:" . $err;
        header('location:Error.php');
        return array();
    } else {
        $res = json_decode($response, true);
        // echo $response;
        // return $res;
        // $images_url = array();
        $movie_id = array();
        if (!is_null($res)) {
            foreach ($res as $val) {
                $arr = explode("/", $val);
                // var_dump($arr);
                array_push($movie_id, $arr[2]);
            }
        }

        return $movie_id;
    }
}

function getGenreFromId($id)
{
    // var_dump($id);
    // echo "<br>";

    global $api_key;
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/title/get-genres?tconst=" . $id,
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

    if ($err) {
        // echo "cURL Error #:" . $err;
        header('location:Error.php');
    } else {
        $res = json_decode($response);
        // var_dump($res);
        return $res;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Details</title>
    <link rel="stylesheet" href="user_page.css">
</head>

<body>
    <div class="navbar">
        <!-- <a href="hello.php">Home</a>
        <a href="#">About Us</a> -->
        <button class="logout" onclick="location.href='logout.php'">Logout</button>
    </div>
    <!-- <h1>Hello User <span><?php
                                // echo $_SESSION['user_name']
                                ?></span></h1>
    <a href="logout.php" class="btn">Logout</a> -->
    <!-- Side navigation -->
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
                    echo "cURL Error #:" . $err;
                } else {
                    // echo "<section class='section1'><p>" . $response . "</p></section>";
                    $result = json_decode($response, true);
                    // $movie_data = [];
                    echo "<form action='' method='post'>";
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
                        echo "</form>";
                    }
                }
            }
            ?>
        </div>

        <div class="content">
            <?php
            $email = $_SESSION['email'];
            $query = "SELECT `id` FROM `review_db` WHERE `email` = '$email';";
            try {
                $result = mysqli_query($conn, $query);
                $res = mysqli_fetch_array($result);
                if (!is_null($res) and sizeof($res) > 0) {
                    $arr = array();
                    $res = array_unique($res);
                    $count = 0;
                    foreach ($res as $val) {
                        if ($count == 3) {
                            break;
                        }
                        $count += 1;
                        $diff_genre = getGenreFromId($val);
                        // getGenreFromId($val);
                        if (!empty($diff_genre)) {
                            foreach ($diff_genre as $v) {
                                array_push($arr, $v);
                            }
                        }
                    }
                    $arr = array_unique($arr);
                    // var_dump($arr);
                    $all_genre_movie = array();
                    if (!empty($arr)) {
                        foreach ($arr as $genre) {
                            // var_dump($genre);
                            $movie_id = getgenre($genre);
                            $movie_id = array_unique($movie_id);
                            foreach ($movie_id as $ids) {
                                array_push($all_genre_movie, $ids);
                            }
                        }
                    }

                    $all_genre_movie = array_unique($all_genre_movie);
                    $count = 0;
                    echo "<div class='similar-movie'>";
                    foreach ($all_genre_movie as $ids) {
                        $count += 1;
                        $details = get_movie_details($ids);
                        if (!is_null($details) and array_key_exists('image', $details)) {
                            if (array_key_exists('url', $details['image'])) {
                                $img = $details['image']['url'];
                                echo "<div class='each-movie'>";
                                echo "<image src= $img alt='?' class='img-genre'></image>";
                                $movie_id_for_details = $details['id'];
                                $exp_arr = explode("/", $movie_id_for_details);
                                $movie_id_for_details = $exp_arr[2];
                                $movie_title = $details['title'];
                                echo "<a class='genre_res' href='movie_details.php?id=$movie_id_for_details'>$movie_title</a><br>";
                                echo "</div>";
                            }
                        }
                    }
                }
                echo "</div>";
                if (is_null($res) or sizeof($res) <= 2) {
                    $adventure = getgenre('adventure');
                    $romantic = getgenre('romantic');
                    $scifi = getgenre('scifi');
                    // echo $adventure . "<br>";
                    // echo $romantic . "<br>";
                    // echo $scifi . "<br>";
                }
            } catch (Exception $e) {
            }
            ?>
        </div>
    </div>

</body>

</html>