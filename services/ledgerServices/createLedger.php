<?php
$hostname ='localhost';
$username = 'root';
$password = '';
$database = 'debit_credit_tracker';
//creating connection
$conn = new mysqli($hostname, $username, $password, $database);

//check connection
if ($conn->connect_error) {
    die('Connection Failed'. $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // fetch data from form
    $entity = $_POST['entity'];

    // run db query
    $sql = "INSERT INTO ledger (entity) VALUES('$entity')";
    $result = $conn->query($sql);

    // if success return back
    if($result == true){
     header('Location: /hello/index.php');
    }

    $conn->close();
}