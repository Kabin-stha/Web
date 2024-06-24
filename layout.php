<?php
session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!==true){
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bootstrap Demo</title>

</head>

<script>
function linkToIndex() {
    window.location.href = './index.php';
};

function linkToTransaction() {
    window.location.href = './transaction.php';
};
function linkToLogOut() {
    window.location.href = './login.php';
};
</script>

<body class="container mt-5">
    <header>
        <nav class="navbar">
            <form class="container justify-content-start">
                <h1 style="margin-right: 30px;">Debit Credit Tracker</h1>
                <button class="btn btn-outline-success me-2" type="button" onclick="linkToIndex()">
                    Home
                </button>
                
               
                <button class="btn btn-outline-success me-2" type="button" onclick="linkToTransaction()">
                    Transaction
                </button>
                <button class="btn btn-outline-danger me-2" type="button" onclick="linkToLogOut()">
                    LogOut
                </button>
                
            </form>
        </nav>
    </header>

    <main style="margin: 10px 40px;">
        <?php 
    echo $content;
     ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>