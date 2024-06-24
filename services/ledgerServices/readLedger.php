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

// Fetch data
$sql_query = "SELECT * FROM ledger";
$result = $conn->query($sql_query);

// Store the fetched data in an array
$ledger_data = [];
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
       $ledger_data[] = $row; 
    }
}
$conn->close();