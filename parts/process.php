<?php
// Database connection settings
$servername = "localhost"; // Change this if your database server is on a different host
$username = "root"; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$database = "students"; // Replace with the name of your MySQL database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNo = $_POST['phone_no'];
    $department = $_POST['department'];
    $studyYear = $_POST['study-year'];
    $rollNumber = $_POST['roll-number'];
    $idea = $_POST['idea'];

    // Prepare SQL statement
    $sql = "INSERT INTO ideas (name, email, phone_no, department, study_year, roll_number, idea) VALUES ('$name', '$email', '$phoneNo', '$department', '$studyYear', '$rollNumber', '$idea')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the form with success message
        header('Location: sip.html?status=success');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If not a POST request, redirect to form page
    header('Location: sip.html');
    exit();
}

$conn->close();
?>
