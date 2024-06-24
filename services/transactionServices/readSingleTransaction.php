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

// Check if the ID parameter is provided
if(isset($_GET['transaction_id'])) {
    $transaction_id = intval($_GET['transaction_id']);

    // Prepare the SQL query to fetch the ledger entry
    $fetch_transaction_query = "SELECT * FROM `transaction` WHERE `id` = $transaction_id";
    $fetch_transaction_result = $conn->query($fetch_transaction_query);

    // Fetch the result
    if($fetch_transaction_result->num_rows > 0) {
        $transaction = $fetch_transaction_result->fetch_assoc();
    } else {
        $transaction = null;
    }
} else {
    echo "No ID Provided";
}

$conn->close();