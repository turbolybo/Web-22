<head><link rel="stylesheet" type="text/css" href="css/arrangement.css"></head>
<?php
   $free = true;
   $pris = 200;

   $id = $_GET['id'];

   require 'vendor/autoload.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');
   // Local

   $port = 3306;
   $username = 'root';
   $password = '';
   $name = 'events';
   $connection = new PDO('mysql:host=localhost;dbname=eksamen', $username, $password);


   $statement = $connection->prepare('SELECT * FROM events WHERE id=:id');
   $statement->bindParam(':id', $id);
   $statement->execute();
   $row = $statement->fetch();
?>
<body ontouchstart>
   <?php include_once 'php/header.php'; ?>
   <div id="main-wrapper">
        <div id="cover" style="background-image: url('<?php echo $row['img_url']; ?>')">
           <?php
             if ($free) {
                echo '<div id="isFree">GRATIS!</div>';
             } else {
                echo '<div id="isNotFree">', $pris, ",-", '</div>';
             }
           ?>
        </div>
        <section>
             <h1><?php echo $row['title']; ?></h1>

             <article>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc
                <br><iframe width="100%" height="600" src="https://www.youtube.com/embed/y48dJA10JzE" frameborder="0" allowfullscreen></iframe>
             </article>
        </section>
   </div>
   <?php include_once 'php/footer.php';?>
</body>
