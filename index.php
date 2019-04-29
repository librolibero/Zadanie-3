<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Upload zajęcia do bazy danych</title>
    </head>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Wybierz zdjęcie
            <input type="file" name="file">
            <input type="submit" name="submit" value="Upload">
        </form>
        <?php
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
    </body>
</html>