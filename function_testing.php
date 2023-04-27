<!-- <?php
ini_set('display_errors', 1);
$to = '20bce101@nirmauni.ac.in';
$subject = 'Nirma Sucks';
$message ='This is first php mail.';
$headers = 'From: 20bce107@nirmauni.ac.in';
mail($to,$subject,$message,$headers);
echo "Done";
?> -->

<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/auto-complete?q=innocent",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
		"X-RapidAPI-Key: 2b4d92d6c0msh9b1c872d5192902p1e833djsn347bed5ffa67",
		// "content-type: application/octet-stream"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

?>