<?php
function checkLogin() {
    if (isset($_GET['login'])) {
        if ($_GET['login'] == "false") {
            echo "Wrong credentials";
        }

    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Homework 5: AJAX</title>
    </head>
    <body>


        <h1> Quiz Login</h1>

        <form method="POST" action="loginProcess.php">

        Username: <input type="text" name="username"/> <br />
        Password: <input type="password" name="password"/> <br />
        <input type="submit" value="Login!" name="loginForm" />
        </form>

        <?=checkLogin()?>


    </body>
</html>