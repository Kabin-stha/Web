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

// Fetch Data
$sql_query = "SELECT * FROM transaction";

$result = $conn->query($sql_query);

// Store the fetched data in an array
$transaction_data = [];
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
       $transaction_data[] = $row; 
    }
}
$conn->close();