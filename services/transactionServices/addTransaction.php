<?php
// Database credentials
$hostname = 'localhost';
$username = 'root';
$password= '';
$database = 'debit_credit_tracker';

// Create Connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check Connection
if($conn->connect_error){
    die("Connection Error".$conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // fetch data from form
    $is_debit_or_credit = $_POST['is_debit_or_credit'];
    $amount = $_POST['amount'];
    $ledger_id = $_POST['ledger_id'];
    

    // run db query
    $sql = "INSERT INTO transaction (is_debit_or_credit, amount, ledger_id) VALUES('$is_debit_or_credit', '$amount', '$ledger_id')";
    $result = $conn->query($sql);

    // if success return back
    if($result == true){
     header('Location: /hello/transaction.php');
    }

    $conn->close();
}