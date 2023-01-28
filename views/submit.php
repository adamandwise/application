<include href="views/header.html"></include>
<body>


<?php
    // creating variables in php to vardump my form
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