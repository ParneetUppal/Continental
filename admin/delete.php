<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    if ($id) {
        include("../connect.php");
        $sqlDelete = "DELETE FROM historicalentries WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sqlDelete);
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            session_start();
            $_SESSION["delete"] = "Post deleted successfully";
            header("Location: index.php");
            exit();
        } else {
            die("Something went wrong. Data was not deleted.");
        }
    } else {
        echo "Post not found";
    }
} else {
    header("Location: index.php");
    exit();
}
