<?php


try {
    $conn = mysqli_connect('localhost', 'root', '', 'UserDirectory') or die("Unable to connect");
}

//catch exception
catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
    // echo "great work!!";
?>