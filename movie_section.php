<?php
    @include 'config.php';
    session_start();

    class movie{
        var $movie_name;
        var $month;
        var $year;
        var $desc;

        public function __construct($movie_name, $month, $year, $desc){
            $this->movie_name = $movie_name;
            $this->month = $month;
            $this->year = $year;
            $this->desc = $desc;
        }

        public function add_movie(){
            $insert = "INSERT INTO movie (movie_name,month,year,description) VALUES('$this->movie_name', '$this->month', '$this->year', '$this->desc')";
            mysqli_query($conn,$insert);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Section</title>
</head>
<body>
    <form action="" method="post">
        <label>Enter movie name: </label>
        <input type="text" name="movie_name" required placeholder="enter movie name"><br>
        <label>Select Month: </label>
        <select name="month">
            <option>January</option>
            <option>February</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>June</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>
        </select><br>
        <label>Enter movie year: </label>
        <input type="number" name="year" min="1900" max="9999"><br>
        <label>Add movie description: </label>
        <input type="text" name="description"><br>
        <input type="submit" name="submit" value="Add now" class="form-btn">
    </form>
</body>