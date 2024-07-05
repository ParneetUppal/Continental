<?php
session_start();
include('../connect.php'); 

$error = "";

if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   $stmt = $conn->prepare("SELECT id, password, role FROM Users WHERE username = ?");
   $stmt->bind_param("s", $username);
   $stmt->execute();
   $stmt->store_result();
   
   // Check if the username exists
   if ($stmt->num_rows > 0) {
       $stmt->bind_result($id, $db_password, $role);
       $stmt->fetch();

       // Verify the password directly (plain text comparison)
       if ($password === $db_password) {
           // Authentication successful, redirect to index.php
           $_SESSION['username'] = $username;
           header("Location: index.php");
           exit; 
       } else {
           $error = "Invalid password.";
       }
   } else {
       $error = "No user found with that username.";
   }
   $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1 style="font-size: 72px; font-family:Baskerville old face; text-decoration-thickness: 50px; color: #333; text-align: center; margin-top: 20px;">Login</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5" style="max-width:600px">
        <div class="login-form">
            <?php if ($error) { ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
            <form action="login.php" method="post">
                <div class="form-field mb-4">
                    <label for="username" class="form-label" style="font: size 25px;font-family:verdana;">Username</label>
                    <input class="form-control" type="text" name="username" id="username" placeholder="" required>
                </div>
                <div class="form-field mb-4">
                    <label for="password" class="form-label"style="font: size 25px;font-family:verdana;">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="" required>
                </div>
                <div class="form-field mb-4"style= "text-align:center; border-radius: 8px; font-size: 16px;">
                    <input class="btn btn-primary" type="submit" value="SUBMIT" name="login">
                </div>

                <div class="footer p-4 mt-4"style="font-family:Baskerville old face; text-align:center; color:#000000;">
                    <a href="../index.php">Back to Archives</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>



