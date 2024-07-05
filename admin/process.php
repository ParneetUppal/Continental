<?php
session_start(); 

if (isset($_POST["create"])) {
    include("../connect.php");

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $region = mysqli_real_escape_string($conn, $_POST["region"]);

    // Image upload handling
    $uploadDir = 'uploads/';
    $fileName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $imagePath = $uploadDir . time() . '_' . $fileName; 

    if (move_uploaded_file($tmpName, $imagePath)) {
        // SQL query to insert data into database
        $sqlInsert = "INSERT INTO historicalentries (title, content, region, image_path) 
                      VALUES ('$title', '$content', '$region', '$imagePath')";

        if (mysqli_query($conn, $sqlInsert)) {
            $_SESSION['create'] = "Post added successfully.";
            header("Location: index.php"); 
            exit();
        } else {
            die("Error: " . mysqli_error($conn));
        }
    } else {
        die("Error uploading file.");
    }

    mysqli_close($conn);
} elseif (isset($_POST["update"])) {
    include("../connect.php");

    // Escape user inputs for security
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $region = mysqli_real_escape_string($conn, $_POST["region"]);

    // Image upload handling (if image is updated)
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'uploads/';
        $fileName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $imagePath = $uploadDir . time() . '_' . $fileName; 

        if (move_uploaded_file($tmpName, $imagePath)) {
            // Update with new image path
            $sqlUpdate = "UPDATE historicalentries 
                          SET title = '$title', content = '$content', region = '$region', image_path = '$imagePath' 
                          WHERE id = $id";
        } else {
            die("Error uploading file.");
        }
    } else {
        // Update without changing the image path
        $sqlUpdate = "UPDATE historicalentries 
                      SET title = '$title', content = '$content', region = '$region' 
                      WHERE id = $id";
    }

    if (mysqli_query($conn, $sqlUpdate)) {
        $_SESSION["update"] = "Post updated successfully.";
        header("Location: index.php"); 
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_close($conn);
} else {
    header("Location: index.php"); 
    exit();
}
?>
