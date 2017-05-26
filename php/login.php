<?php
session_start();
/* DECLARE VARIABLES */
$username = 'admin';
$password = 'admin';
$random1 = 'secret_key1';
$random2 = 'secret_key2';
$hash = md5($random1 . $password . $random2);
$self = $_SERVER['REQUEST_URI'];
/* USER LOGOUT */
if(isset($_GET['logout']))
{
    unset($_SESSION['login']);
}
/* USER IS LOGGED IN */
if (isset($_SESSION['login']) && $_SESSION['login'] == $hash)
{
    logged_in_msg($username);
}
/* FORM HAS BEEN SUBMITTED */
else if (isset($_POST['submit']))
{
    if ($_POST['username'] == $username && $_POST['password'] == $password)
    {
        //IF USERNAME AND PASSWORD ARE CORRECT SET THE LOGIN SESSION
        $_SESSION["login"] = $hash;
        header("Location: $_SERVER[PHP_SELF]");
    }
    else
    {
        // DISPLAY FORM WITH ERROR
        display_login_form();
        display_error_msg();
    }
}
/* SHOW THE LOGIN FORM */
else
{
    display_login_form();
}
/* TEMPLATES */
function display_login_form()
{
    echo '<form action="../admin.php' . isset($self) . '" method="post">' .
        '<label for="username">username</label>' .
        '<input type="text" name="username" id="username">' .
        '<label for="password">password</label>' .
        '<input type="password" name="password" id="password">' .
        '<input type="submit" name="submit" value="submit">' .
        '</form>';
}
function logged_in_msg($username)
{
    echo '<p>Hello ' . $username . ', you have successfully logged in!</p>' .
        '<a href="?logout=true">Logout?</a>';
}
function display_error_msg()
{
    echo '<p>Username or password is invalid</p>';
}
?>