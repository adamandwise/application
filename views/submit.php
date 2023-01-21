<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submitted</title>
</head>
<body>


<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $state = $_POST['state'];
    $sex = $_POST['sex'];
    $resume = $_POST['resume'];
    $coverLetter = $_POST['coverLetter'];

    echo "<p>Thank you $name for applying</p>";
echo "<p>Email: $email </p>";
echo "<p>Date of Birth: $dob  </p>";
echo "<p>Address: $address  </p>";
echo "<p>City: $city  </p>";
echo "<p>State:$state  ";
echo "<p>Zip: $zip  ";
echo "<p>Sex: $sex";
?>

</body>
</html>