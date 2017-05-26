<?php

use Illuminate\Database\Eloquent\Model;
require_once '../vendor/autoload.php';
session_start();
if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
{
    header("Location:../404.php");
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
   <div id="admin-container">
      <?php
         $event = Event::where('id', '=', $id)->first();
      ?>
      <form action="" method="post">
         <h2>Rediger arrangement</h2>
         <select id="school-dropdown" name="skole"><option hidden value="Velg skole">Velg skole</option>
            <option value="1">Campus Brenneriveien</option>
            <option value="2">Campus Vulkan</option>
            <option value="3">Campus Fjerdingen</option>
         </select>
         <input type="text" placehoder="Tittel" name="title" value="<?= $event['title'] ?>" class="ico-title" required></input>
         <input type="text" placehoder="Description" name="description" value="<?= $event['description'] ?>" class="ico-title" required></input>
         <input type="text" placehoder="Pris" name="pris" value="<?= $event['pris'] ?>" class="ico-title" required></input>
         <input type="date" name="date" class="ico-title" required></input>
         <input type="text" placehoder="Bildelenke" name="img_url" value="<?= $event['img_url'] ?>" class="ico-title" required></input>
         <input type="text" placehoder="Type" name="type" value="<?= $event['type'] ?>" class="ico-title" required></input>
         <input type="submit" name="submit" class="add" value="OPPDATER"></input>
      </form>
      <?php

      if (isset($_POST['submit'])) {
         $title = $_POST['title'];
         $description = $_POST['description'];
         $pris = $_POST['pris'];
         $url = $_POST['img_url'];
         $date = $_POST['date'];
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

         $a = $event;
         $a->title = $title;
         $a->description = $description;
         $a->pris = $pris;
         $a->img_url = $url;
         $a->date = $date;
         $a->type = $type;
         $a->skole_id = $school;
         $a->save();

            header('Location: ../admin.php');
      }
      ?>
   </div>
      </div>
   <?php include_once '../php/footer.php'; ?>
</body>
