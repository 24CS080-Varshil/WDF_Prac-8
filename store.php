<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "PRAC_8";

$connect = new mysqli($servername, $username, $password);


if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($connect->query($sql) === TRUE) {

} else {
    die("Error creating database: " . $connect->error);
}


$connect->select_db($dbname);

$table_sql = "CREATE TABLE IF NOT EXISTS event (
    event_no INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(100) NOT NULL,
    event_date DATE NOT NULL,
    venue VARCHAR(100) NOT NULL,
    organizer VARCHAR(100) NOT NULL
)";
if (!$connect->query($table_sql)) {
    die("Error creating table: " . $connect->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = trim(htmlspecialchars($_POST['event_name']));
    $event_date = trim(htmlspecialchars($_POST['event_date']));
    $venue = trim(htmlspecialchars($_POST['venue']));
    $organizer = trim(htmlspecialchars($_POST['organizer']));

    if (empty($event_name) || empty($event_date) || empty($venue) || empty($organizer)) {
        header("Location: event.php");
        exit();
    }

    $stmt = $connect->prepare("INSERT INTO event (event_name, event_date, venue, organizer) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $event_name, $event_date, $venue, $organizer);

    if ($stmt->execute()) {
        echo "New record inserted successfully!";
    } else {
        echo "Error inserting record: " . $stmt->error;
    }
    $stmt->close();
}


?>
