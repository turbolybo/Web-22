<?php

use Illuminate\Database\Eloquent\Model;
require_once '../vendor/autoload.php';
session_start();
if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
{
   echo "<script>location.href='../404.php';</script>";
}
class Activity extends Model
{
    public $table = "activity";
    protected $fillable = ['id', 'title', 'address'];
    protected $dates = ['date'];
    public $timestamps = false;

}
?>
<?php
   include_once 'header-admin.php';
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
   <div id="admin-container">
      <?php
         $activity = Activity::where('id', '=', $id)->first();
      ?>
      <form action="" method="post">
         <h2>Rediger arrangement</h2>
         <select id="school-dropdown" name="skole"><option hidden value="Velg skole">Velg skole</option>
            <option value="1">Campus Brenneriveien</option>
            <option value="2">Campus Vulkan</option>
            <option value="3">Campus Fjerdingen</option>
         </select>
         <input type="text" placehoder="Tittel" name="title" value="<?= $activity['title'] ?>" class="ico-title" required></input>
         <textarea placehoder="Description" name="description" value="" class="ico-title" required><?= $activity['description'] ?></textarea>
         <input type="text" placehoder="Adresse" name="maps" value="<?= $activity['maps'] ?>" class="ico-title" required></input>
         <input type="text" placehoder="Bildelenke" name="img_url" value="<?= $activity['img_url'] ?>" class="ico-title" required></input>
         <input type="text" placehoder="Type" name="type" value="<?= $activity['type'] ?>" class="ico-title" required></input>
         <input type="text" placehoder="Hjemmeside" name="web" value="<?= $activity['web'] ?>" class="ico-title" required></input>
         <input type="text" placehoder="Rating" name="rating" value="<?= $activity['rating'] ?>" class="ico-title" required></input>
         <input type="submit" name="submit" class="add" value="OPPDATER"></input>
      </form>
      <?php

      if (isset($_POST['submit'])) {
         $title = $_POST['title'];
         $description = $_POST['description'];
         $maps = $_POST['maps'];
         $web = $_POST['web'];
         $rating = $_POST['rating'];
         $url = $_POST['img_url'];
         $type = $_POST['type'];
         $school = $_POST['skole'];
         $schoolId = $_POST['skole'];

         switch($school) {
             case 'Campus Brennerviveien';
                 $schoolId = 1;
                 break;
             case 'Campus Vulkan';
                 $schoolId = 2;
                 break;
             case 'Campus Fjerdingen';
                 $schoolId = 3;
                 break;
         }

         $a = $activity;
         $a->title = $title;
         $a->description = $description;
         $a->maps = $maps;
         $a->img_url = $url;
         $a->web = $web;
         $a->rating = $rating;
         $a->type = $type;
         $a->skoleID = $school;
         $a->save();
            echo "<script>location.href='../admin.php';</script>";
      }
      ?>
   </div>
      </div>
   <?php include_once '../php/footer.php'; ?>
</body>
