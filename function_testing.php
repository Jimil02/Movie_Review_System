<?php
ini_set('display_errors', 1);
$to = '20bce101@nirmauni.ac.in';
$subject = 'Nirma Sucks';
$message ='This is first php mail.';
$headers = 'From: 20bce107@nirmauni.ac.in';
mail($to,$subject,$message,$headers);
echo "Done";
?>