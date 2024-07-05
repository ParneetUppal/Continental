<?php
include("connect.php");

function displayImage($imagePath) {
    if (file_exists($imagePath)) {
        echo '<img src="' . $imagePath . '" alt="Image" style="max-width: 100px; max-height: 100px;">';
    } else {
        echo 'No Image';
    }
}

$sqlSelect = "SELECT * FROM historicalentries";
$result = mysqli_query($conn, $sqlSelect);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Archival History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        /* Add your custom CSS styles here */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .footer {
            font-size: 20px;
            text-decoration-thickness: 50px;
            font-family: "Baskerville old face";
            text-align: left;
            color: #000000;
            width: 100%;
            padding: 4px;
            position: fixed; /* Fix the footer to the viewport */
            bottom: 0; /* Position it at the bottom of the viewport */
            left: 0;/* Remove absolute positioning */
        }

        .footer a {
            color: inherit;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none"style="font-size:85px; font-family:Baskerville old face; text-align:center; color:#000000;">Archival History</a></h1>
    </header>
    <div class="post-list mt-5">
        <div class="container">
            <?php
            include("connect.php"); 

            $sqlSelect = "SELECT * FROM historicalentries";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="row mb-4 p-5 bg-light">
                    <div class="col-sm-2">
                        <h2><?php echo htmlspecialchars($data["title"]); ?></h2>
                    </div>
                    <div class="col-sm-3">
                        <p><?php echo htmlspecialchars($data["content"]); ?></p>
                    </div>
                    <div class="col-sm-5">
                        <p><?php echo htmlspecialchars($data["region"]); ?></p>
                    </div>
                    <div class="col-sm-2">
                        <?php 
                        $imagePath = 'admin/uploads/' . $data['id'] . '.png'; 
                        displayImage($imagePath);
                        ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">READ MORE</a>
                    </div>
                </div>
                <?php
            }
            mysqli_close($conn);
            ?>
         </div>
    </div>
    <div class="footer">
        <a href="admin/login.php" >Admin Panel</a>
    </div>
</body>
</html>

