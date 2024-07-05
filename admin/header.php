<?php
session_start();
if (!isset($_SESSION["user"])) {
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continental Archive</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard d-flex justify-content-between">
        <div class="sidebar bg-dark vh-100">
            <h1 class="bg-primary p-4"><a href="./index.php" class="text-light text-decoration-none">Continental Archive</a></h1>
            <div class="menues p-4 mt-5">
                <div class="menu mt-5">
                    <a href="Create.php" class="btn btn-info">Create History</a>
                    <a href="logout.php" class="btn btn-info">Log Out</a>
                </div>
                
            </div>
        </div>