<?php 
include("header.php");
?>
<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="process.php" method="post" enctype="multipart/form-data">
        <div class="form-field mb-4">
            <input type="text" class="form-control" name="title" placeholder="Enter Title:" required>
        </div>
        <div class="form-field mb-4">
            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Content:" required></textarea>
        </div>
        <div class="form-field mb-4">
            <textarea name="region" class="form-control" cols="30" rows="5" placeholder="Region:" required></textarea>
        </div>
        <div class="form-field mb-4">
            <label for="image">Upload Image:</label>
            <input type="file" class="form-control-file" name="image" id="image" accept=".png">
        </div>
        <div class="form-field">
            <input type="submit" class="btn btn-primary" value="Submit" name="create">
        </div>
    </form>
</div>
<?php 
include("footer.php");
?>
