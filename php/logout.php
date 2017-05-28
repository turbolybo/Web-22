<?php
session_start();

echo "Logout Successfully ";
session_destroy();   // function that Destroys Session
echo "<script>location.href='../index.php';</script>";
?>
