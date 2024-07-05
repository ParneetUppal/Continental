<?php
include("header.php");
?>

<div style="width: 100%; background-color: #f8f9fa; padding: 30px; box-sizing: border-box; border-radius: 8px; margin: 20px 0;">
    <?php
    $id = $_GET["id"];
    if ($id) {
        include("../connect.php");
        $sqlSelectPost = "SELECT * FROM historicalentries WHERE id = $id";
        $result = mysqli_query($conn, $sqlSelectPost);
        if ($data = mysqli_fetch_array($result)) {
        ?>
        <table style="width: 100%; border-collapse: collapse; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <tr style="border-bottom: 1px solid #ddd;">
                <th style="text-align: left; padding: 15px; font-size: 18px; color: #333;">Title</th>
                <th style="text-align: left; padding: 15px; font-size: 18px; color: #333;">Content</th>
                <th style="text-align: left; padding: 15px; font-size: 18px; color: #333;">Region</th>
                <th style="text-align: left; padding: 15px; font-size: 18px; color: #333;">Image</th>
            </tr>
            <tr>
                <td style="padding: 15px; font-size: 16px;"><?php echo htmlspecialchars($data['title']); ?></td>
                <td style="padding: 15px; font-size: 16px;"><?php echo nl2br(htmlspecialchars($data['content'])); ?></td>
                <td style="padding: 15px; font-size: 16px; font-style: italic; color: #555;"><?php echo htmlspecialchars($data['region']); ?></td>
                <td style="padding: 15px;">
                    <?php
                    //only for .png extensions for now 
                    $imagePath = 'uploads/' . $data['id'] . '.png'; 
                    if (file_exists($imagePath)) {
                        echo '<img src="' . $imagePath . '" alt="Image" style="max-width: 200px; max-height: 200px;">';
                    } else {
                        echo 'No Image';
                    }
                    ?>
                </td>
            </tr>
        </table>
        <?php
        } else {
            echo "<div style='padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>Post Not Found</div>";
        }
    } else {
        echo "<div style='padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>Post Not Found</div>";
    }
    ?>
</div>

<?php
include("footer.php");
?>
