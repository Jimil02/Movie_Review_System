<?php
@include 'config.php';
session_start();
if (!isset($_SESSION['admin_name']) and !isset($_SESSION['user_name'])) {
    // echo "Admin name not set";
    header('location:login_form.php');
} 

$movie_details = array();

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
                    <from>
            </div>
            <?php
            if (isset($_POST['sbtn']) and isset($_POST['search'])) {
                // echo $_POST['search'];
                $curl = curl_init();
                $movie_name = $_POST['search'];

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://imdb8.p.rapidapi.com/auto-complete?q=" . $movie_name,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: imdb8.p.rapidapi.com",
                        "X-RapidAPI-Key: 69873a52f7msh3240d2bfcfdb944p17f775jsn01d66f73575c"
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
            ?>
        </div>

        <div class="content">
            <!-- <section>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos fugiat porro aliquam vitae adipisci soluta optio illum sunt nobis eum ducimus doloremque maxime enim provident deserunt possimus suscipit nesciunt incidunt, doloribus maiores, harum aliquid. Debitis hic voluptatem obcaecati harum odio quisquam consequuntur fuga sapiente. Possimus eius id quisquam. Soluta nostrum quam, corrupti deleniti in quidem consectetur impedit magnam mollitia perferendis esse nihil quisquam vero incidunt aut illo, neque blanditiis iusto fugiat eos iure rerum fugit laborum? Perspiciatis ea nihil reprehenderit quidem odit, aspernatur quas minus incidunt ducimus doloremque ratione provident officia atque! Libero accusamus velit aperiam autem fuga explicabo atque. Repellat dolorem magnam aliquam totam reprehenderit eveniet laudantium perspiciatis similique nesciunt sapiente in, excepturi consequatur, blanditiis, saepe ipsa sunt neque recusandae corrupti praesentium odio adipisci exercitationem sed! Dolore dolor ratione a adipisci commodi suscipit impedit esse quam, beatae eaque minus. Numquam at necessitatibus ex cumque hic, mollitia officia quisquam, ad dolorum, magni autem corporis soluta repudiandae illo! Vel quia hic sint vero ducimus blanditiis quaerat nesciunt unde illum recusandae? Dolorem velit quod tenetur inventore praesentium aut voluptatum similique, accusantium expedita autem suscipit totam voluptas illum temporibus eveniet esse quo veniam nihil vel quae ipsam debitis voluptatibus repellat. Distinctio, accusamus harum?
                </p>
            </section> -->

            <?php
            if (isset($_POST['id'])) {

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://imdb8.p.rapidapi.com/title/get-details?tconst=" . $id,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => [
                        "X-RapidAPI-Host: imdb8.p.rapidapi.com",
                        "X-RapidAPI-Key: 69873a52f7msh3240d2bfcfdb944p17f775jsn01d66f73575c"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                $result = json_decode($response, true);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $id = $_POST['id'];
                    global $movie;
                    // echo $response;
                    global $movie_details;
                    $movie_details['id'] = $id;
                    $movie_details['name'] = $name;
                    $movie_details['img'] = $img;
                    $movie_details["titleType"] = $result['titleType'];
                    $movie_details["year"] = $result['year'];
                    $movie_details["numberOfEpisodes"] = $result['numberOfEpisodes'];

                    echo "<div class='api-val'>";
                    echo "
                    <image src= " . $movie_details['img'] . " alt='?' class='img-api'></image><br>
                    ";
                    foreach ($movie_details as $key => $val) {
                        if ($key == 'img')  continue;
                        echo "<h2>$val</h2>";
                    }
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>

    <script>
        function getDetails() {
            // const options = {
            //     method: 'GET',
            //     headers: {
            //         'X-RapidAPI-Key': '69873a52f7msh3240d2bfcfdb944p17f775jsn01d66f73575c',
            //         'X-RapidAPI-Host': 'imdb8.p.rapidapi.com'
            //     }
            // };

            // fetch(`https://imdb8.p.rapidapi.com/title/get-details?tconst=${id}`, options)
            //     .then(response => response.json())
            //     .then(response => console.log(response))
            //     .catch(err => console.error(err));

            <?php

            ?>
        }
    </script>

</body>

</html>