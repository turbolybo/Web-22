<footer class="footer-container">
   <div id="footer-inner">
        <ul class="sitemap">
           <li><b>Oversikt:</b></li>
           <a href="./index.php"><li>Hjem</li></a>
           <a href="./arrangement.php"><li>Arrangementer</li></a>
           <a href="./index.php"><li>Aktiviteter</li></a>
           <a href="./index.php"><li>Campus</li></a>
        </ul>
        <ul class="sitemap">
           <li><b>Arrangementer:</b></li>
           <a href="./index.php"><li>Nær Fjerdingen</li></a>
           <a href="./index.php"><li>Nær Vulkan</li></a>
           <a href="./index.php"><li>Nær Brenneriveien</li></a>
        </ul>
        <ul class="sitemap">
           <li><b>Aktiviteter:</b></li>
           <a href="./index.php"><li>Nær Fjerdingen</li></a>
           <a href="./index.php"><li>Nær Vulkan</li></a>
           <a href="./index.php"><li>Nær Brenneriveien</li></a>
        </ul>
        <ul class="sitemap">
           <li><b>Campus:</b></li>
            <a href="./skole.php?skoleId=3"><li>Fjerdingen</li></a>
            <a href="./skole.php?skoleId=2"><li>Brenneriveien</li></a>
            <a href="./skole.php?skoleId=1"><li>Vulkan</li></a>
        </ul>
   </div>

    <div id="footer-bottom">Copyright © 2017 - Eksamensgruppe 22. Alle rettigheter forbeholdes.
        <button1 onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><a>Logg inn Admin</a></button1></div>
</footer>

<div id="id01" class="modal">

    <form class="modal-content animate" action="admin.php">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="http://ambisjoner.no/wp-content/uploads/2015/01/Westerdals-logo1-1024x696.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label><b>Brukernavn</b></label>
            <input type="text" placeholder="Skriv inn brukernavn" name="uname" required>

            <label><b>Passord</b></label>
            <input type="password" placeholder="Skriv inn passord" name="psw" required>

            <button type="submit">Login</button>
            <input type="checkbox" checked="checked"> Husk meg
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Avbryt</button>
            <span class="psw">Glemt <a href="#">passord?</a></span>
        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
