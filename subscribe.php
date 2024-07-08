<?php
// Database connection
$servername = "localhost"; // Change this to your database server name
$username = "techbayventures"; // Change this to your database username
$password = "@TechBay2024"; // Change this to your database password
$dbname = "subscribers"; // Change this to your database name


// Database connection
$mysqli = new mysqli("$servername", "$username", "$password", "$dbname");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email address from the form
    $email = $_POST["email"];

    // Prepare SQL statement to insert email if it doesn't already exist
    $insertQuery = "INSERT INTO subscribers (email) SELECT * FROM (SELECT '$email') AS tmp WHERE NOT EXISTS (SELECT email FROM subscribers WHERE email = '$email') LIMIT 1";

    if ($mysqli->query($insertQuery) === TRUE) {
        // Email added successfully
       // Email added successfully
  echo "<p class='feedback-message'>Thank you for subscribing to TechBay Ventures Newsletter with email $email. You will be receiving Updates, Hot Deals, Discounts Straight In Your Inbox Daily</p>";

        // Optionally, send a confirmation email to the user
        // Remember to include the code for sending emails
    } else {
        // Error occurred while inserting email
        echo "Error: " . $mysqli->error;
    }
}

// Close database connection
$mysqli->close();
