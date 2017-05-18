<?php
$title = $_POST['Title'];
$url = $_POST['img_url'];
$description = $_POST['description'];
$school = $_POST['skoleID'];
$type = $_POST['type'];
$web = $_POST['web'];
$rating = $_POST['rating'];

// Connect and select DB
$connect =  mysqli_connect('localhost', 'root', 'root');
if (!$connect) {
    echo 'Not connected';
}

if (!mysqli_select_db($connect, 'eksamen')) {
    echo 'Database not selected';
}

// Submit
$sql = "INSERT INTO activity (id, title, description, img_url, type, skoleID, web, rating)
      VALUES (NULL, '$title', '$description', '$url', '$type', '$school', '$web', '$rating')";

if ($connect->query($sql) === TRUE) {
    header("Location:../index.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}
$connect->close();

?>
