<?php
include('../connect.php');

$uploadDir = 'uploads/';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $fileExtension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $filePath = $uploadDir . $id . '.' . $fileExtension;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        echo "File successfully uploaded to: $filePath";

        $updateQuery = "UPDATE historicalentries SET image_path = '$filePath' WHERE id = $id";
        if ($conn->query($updateQuery) === TRUE) {
            echo "<br>Image path updated in database.";
        } else {
            echo "<br>Error updating image path: " . $conn->error;
        }
    } else {
        echo "File upload failed.";
    }
} else {
    echo "No file uploaded or ID not provided.";
}
?>
