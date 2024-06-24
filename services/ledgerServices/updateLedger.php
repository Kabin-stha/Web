<?php
// database connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'debit_credit_tracker';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if($conn->connect_error){
    die("Connection Error: ".$conn->connect_error);
}

// Check if the ID Parameter and form data are provided
if(isset($_GET['ledger_id'])) {
    $ledger_id = intval($_GET['ledger_id']);
    $entity = $_POST['entity'];

    $update_ledger_query = "UPDATE `ledger` SET `entity` = '$entity' WHERE `id` = $ledger_id";
    $stmt = $conn->query($update_ledger_query);

    if($stmt == true){
        header('Location: /hello/index.php');
        exit();
    }
}

$conn->close();