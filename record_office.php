<?php
require('vendor/autoload.php');
$faker = Faker\Factory::create();
$servername = "localhost";
$username = "root";
$password = "root";
$database = "recordapp_db";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

for ($i = 0; $i <= 100; $i++) {
    $name = mysqli_real_escape_string($conn, $faker->name);
    $contactNum1 = rand(1000, 9999);
    $contactNum = $contactNum1 . "-" . $contactNum1;
    $email = mysqli_real_escape_string($conn, $faker->email);
    $bldg = ['IT Building', 'CS Building', 'New Building', 'ICT Building', 'Library Building', 'New Building'];
    $rand = rand(0, count($bldg) - 1);
    $address = $bldg[$rand];
    $city = "Puerto Princesa";
    $country = "Philippines";
    $postal = 5300;

    $sql = "INSERT INTO office (Name, contactnum, email, address, city, country, postal) 
            VALUES ('$name', '$contactNum', '$email', '$address', '$city', '$country', $postal)";
    mysqli_query($conn, $sql);
}

echo "100 rows of fake data have been inserted into the 'office' table.";

mysqli_close($conn);
?>
