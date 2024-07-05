<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archival History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <style>
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
                $id = $_GET['id'];
                if ($id) {
                    include("connect.php");
                    $sqlSelect = "SELECT * FROM historicalentries WHERE id = $id";
                    $result = mysqli_query($conn, $sqlSelect);
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-bordered">';
                        while ($data = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<th>Title</th>';
                            echo '<td>' . $data['title'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<th>Content</th>';
                            echo '<td>' . $data['content'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<th>Region</th>';
                            echo '<td>' . $data['region'] . '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<th>Image</th>';
                            echo '<td>';
                            $imagePath = 'admin/uploads/' . $data['id'] . '.png'; // Adjust extension as needed
                            if (file_exists($imagePath)) {
                                echo '<img src="' . $imagePath . '" alt="Image" style="max-width: 200px; max-height: 200px;">';
                            } else {
                                echo 'No Image';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo '<p>No post found</p>';
                    }
                    mysqli_close($conn);
                } else {
                    echo '<p>No post found</p>';
                }
            ?>
         </div>
    </div>
    <div class="footer">
        <a href="admin/login.php" >Admin Panel</a>
    </div>
</body>
</html>
