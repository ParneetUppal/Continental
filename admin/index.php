<?php
include("header.php");
?>

<div class="posts-list w-100 p-5">
    <?php
    if (isset($_SESSION["create"])) {
    ?>
    <div class="alert alert-success">
        <?php echo $_SESSION["create"]; ?>
    </div>
    <?php
    unset($_SESSION["create"]);
    }
    ?>
    <?php
    if (isset($_SESSION["update"])) {
    ?>
    <div class="alert alert-success">
        <?php echo $_SESSION["update"]; ?>
    </div>
    <?php
    unset($_SESSION["update"]);
    }
    ?>
    <?php
    if (isset($_SESSION["delete"])) {
    ?>
    <div class="alert alert-success">
        <?php echo $_SESSION["delete"]; ?>
    </div>
    <?php
    unset($_SESSION["delete"]);
    }
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%;">Title</th>
                <th style="width:45%;">Content</th>
                <th style="width:25%;">Region</th>
                <th style="width:15%;">Image <br>[ONLY .png for now]</th>

                <th style="width:20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            include('../connect.php');
            
            function displayImage($entry_id) {
                $imagePath = 'uploads/' . $entry_id . '.png'; 
                if (file_exists($imagePath)) {
                    echo '<img src="' . $imagePath . '" alt="Image" style="max-width: 100px; max-height: 100px;">';
                } else {
                    echo 'No Image';
                }
            }
            
            $sqlSelect = "SELECT * FROM historicalentries";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($data["title"]); ?></td>
                <td><?php echo htmlspecialchars($data["content"]); ?></td>
                <td><?php echo htmlspecialchars($data["region"]); ?></td>
                <td>
                    <?php displayImage($data["id"]); ?>
                </td>
                <td>
                    <a class="btn btn-info" href="view.php?id=<?php echo $data["id"]; ?>">View</a>
                    <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"]; ?>">Edit</a>
                    
                    <!-- File upload form -->
                    <form method="POST" action="fileupload.php" enctype="multipart/form-data" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data["id"]); ?>">
                        <input type="file" name="file">
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </form>

                    <!-- Delete form -->
                    <form method="POST" action="delete.php" style="display:inline;" onsubmit="return confirmDelete();">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($data["id"]); ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
            }
            ?>
           
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this post?');
    }
</script>

<?php
include("footer.php");
?>
