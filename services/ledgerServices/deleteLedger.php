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

// Check if the id parameter is provided
if(isset($_GET['ledger_id'])){
    $ledger_id = $_GET['ledger_id'];

    // Prepare the SQL query to delete the ledger entry
    $delete_ledger_query = "DELETE FROM `ledger` WHERE `id` = $ledger_id";
    $delete_ledger_result = $conn->query($delete_ledger_query);

    // Execute the query and check if it was successful
    if($delete_ledger_result == true){
        header('Location: /hello/index.php');
    } else {
        echo "Error deleting ledger entry: ".$stmt->error;
    }
    
    // Close the statement
    $stmt->close();
} else {
    echo "NO ID PROVIDED!!!";
}
    
$conn->close();