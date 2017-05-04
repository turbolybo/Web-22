<?php
$id = $_GET['id'];
$port = 3306;
$username = 'root';
$password = '';
$name = 'events';
$connection = new PDO('mysql:host=localhost;dbname=eksamen', $username, $password);

$statement = $connection->prepare('SELECT * FROM events WHERE id=:id');
$statement->bindParam(':id', $id);
$statement->execute();
$row = $statement->fetch();

if (isset($_POST['SLETT'])) {
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM events WHERE id= ?";
    $q = $connection->prepare($sql);

    $response = $q->execute(array($id));
    header('Location: ../admin.php');
}
?>
<?php
   include_once 'header.php';
?>
<head>
   <link rel="stylesheet" type="text/css" href="../css/body.css" />
   <link rel="stylesheet" type="text/css" href="../css/header.css" />
   <link rel="stylesheet" type="text/css" href="../css/admin.css" />
</head>
<body>
   <div id="admin-check">
      <form action="" method="post">
         <h4>Er du sikker på at du vil slette "<?= $row['title'] ?>"?</h4>
         <input type="submit" value="SLETT" name="SLETT"></input>
      </form>
   </div>
   <?php include_once '../php/footer.php'; ?>
</body>
