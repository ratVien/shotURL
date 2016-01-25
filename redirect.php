<?php
require( __DIR__ . '/data/functions.php');
$shortCode = $_GET['l'];
try{
    $pdo = DbConnect();
}
catch (\PDOException $e) {
    trigger_error("Data base connection Error!");
    exit;
}
try{
    $longUrl = getUrl($shortCode,$pdo);
    header('Location: ' .$longUrl);
}
catch(\Exception $e){
?>
<!DOCTYPE html>
<html>
<head>
    <title>URL Shortener</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <meta charset="UTF-8">
    <style>
        .bt {
            border-top: 1px solid;
        }
        .ar {
            text-align: right;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h2><a href="index.php">URL Shortener</a></h2>

        <p><?php
    echo $e->getMessage();
    exit;
}
?></p>
    </div>
</div>
</body>
</html>



