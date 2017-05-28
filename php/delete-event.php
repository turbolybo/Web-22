<?php

use Illuminate\Database\Eloquent\Model;
require_once '../vendor/autoload.php';
session_start();
if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
{
    echo "<script>location.href='../404.php';</script>";
}
class Event extends Model
{
    protected $fillable = ['id', 'title', 'description', 'pris', 'img_url', 'date'];
    protected $dates = ['date'];
    public $timestamps = false;

    public function skoler()
    {
        return $this->hasOne('Skole','id','skole_Id');
    }
}
?>
<?php
   include_once 'header.php';
   $id = $_GET['id'];
   use Illuminate\Database\Capsule\Manager as Capsule;
   include '../vendor/autoload.php';
   $config = include("../config.php");

   if($config['debug']==true){
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   }

   $capsule = new Capsule();

   $capsule->addConnection([
       'driver' => $config["driver"],
       'host' => $config["host"],
       'port' => $config["port"],
       'database' => $config["database"],
       'username' => $config["username"],
       'password' => $config["password"],

   ]);
   $capsule->bootEloquent();

?>
<head>
   <link rel="stylesheet" type="text/css" href="../css/body.css" />
   <link rel="stylesheet" type="text/css" href="../css/header.css" />
   <link rel="stylesheet" type="text/css" href="../css/admin.css" />
</head>
<body>
   <?php
      $delete = Event::where('id', '=', $id)->first();
      $delete->delete();
      ?><div id="delete"><?php
      echo 'Slettet arrangement "',$delete['title'],'" med ID: ',$delete['id'],'';
      ?>
      <form action="../admin.php" method="post">
         <input class="submit-first" type="submit" name="goBack" value="< Gå tilbake">
      </form>
      </div>
   <?php include_once '../php/footer.php'; ?>
</body>
