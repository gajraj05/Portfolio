<?php

$host = "localhost";  // XAMPP runs MySQL locally
$user = "root";       // Default MySQL username
$pass = "";           // Default password (leave empty)
$dbname = "portfolio_database"; // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Debug: Print form data before inserting into the database
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";


    // Get form data
    $Full_Name = $_POST['full_name'];
    $Email = $_POST['email'];
    $Mobile = $_POST['mobile'];
    $Subject = $_POST['subject'];
    $Message = $_POST['message'];

    // Insert form data into database
    $stmt = $conn->prepare("INSERT INTO contacts (Full_Name, Email, Mobile, Subject, Message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $Full_Name, $Email, $Mobile, $Subject, $Message);

    if ($stmt->execute()) {
        echo "Message sent successfully!";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();

?>







// $full_name = $_POST['full_name'];
// $email = $_POST['email'];
// $mobile = $_POST['mobile'];
// $subject = $_POST['subject'];
// $message = $_POST['message'];

// // Database Connection

// $conn = new mysqli('localhost','root','','test');
// if($conn->connect_error){
//     die('Connection Failed : '.$conn->connect_error);
//     }else{

// // Insert into database

//         $stmt = $conn->prepare("insert into registration(full_name, email, mobile, subject, message) values(?, ?, ?, ?, ?)");
//         $stmt->bind_param("ssiss", $full_name, $email, $mobile, $subject, $message);
//         $stmt->execute();
//         echo "Registration Successfully...";
//         $stmt->close();
//         $conn->close();
//     }


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     include 'portfolio_database.php';
    
//     // Database connection

//     $full_name = $_POST['full_name'];
//     $email = $_POST['email'];
//     $mobile = $_POST['mobile'];
//     $subject = $_POST['subject'];
//     $message = $_POST['message'];

//     // Insert into database
//     $stmt = $conn->prepare("INSERT INTO contacts (full_name, email, mobile, subject, message) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssss", $full_name, $email, $mobile, $subject, $message);
    
//     if ($stmt->execute()) {
//         echo "Message sent successfully!";
//     } else {
//         echo "Error: " . $conn->error;
//     }

//     $stmt->close();
//     $conn->close();
// } else {
//     // If accessed directly, show error
//     echo "405 Method Not Allowed";
// }
