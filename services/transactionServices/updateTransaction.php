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
if(isset($_GET['transaction_id']) && isset($_POST['is_debit_or_credit']) && isset($_POST['amount'])) {
    $transaction_id = intval($_GET['transaction_id']);
    $is_debit_or_credit = $conn->real_escape_string($_POST['is_debit_or_credit']);
    $amount = $conn->real_escape_string($_POST['amount']);
    
    // Prepare and bind
    $stmt = $conn->prepare("UPDATE `transaction` SET `is_debit_or_credit` = ?, `amount` = ? WHERE `id` = ?");
    $stmt->bind_param("sdi", $is_debit_or_credit, $amount, $transaction_id);
    
    if($stmt->execute()){
        header('Location: /hello/transaction.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $stmt->close();
} else {
    echo "Required parameters are missing.";
}
$conn->close();
?>
