<?php  session_start();
if(isset($_SESSION['use']))
{
    header("Location:../admin.php");
}
require_once 'header.php';
if(isset($_POST['login']))
{
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if($user == "Ank" && $pass == "1234") {
        $_SESSION['use']=$user;
        echo '<script type="text/javascript"> window.open("../admin.php","_self");</script>';
    }  else {
        echo "<br></br><center>Feil brukernavn eller passord. Prøv igjen</center>";
    }
}
?>
<html>
<head>
    <title>Admin - login</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/arrangement.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body ontouchstart>
<form action="" method="post">
   <div id="admin-container">
      <br></br>
      <b>Brukernavn:</b>
      <input type="text" placeholder="Brukernavn" name="user"><br></br>
      <b>Passord:</b>
      <input type="password" placeholder="Passord" name="pass">
      <input type="submit" class="add" name="login" value="LOGIN">
   </div>
</form>
<div id="space""></div>
<?php require_once 'footer.php'; ?>
</body>
</html>
