<?php
    require_once("session.php"); //grab the session instance
?>

<!DOCTYPE html>

<html>

    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css" crossorigin="anonymous">
    </head>

    <body>

        <?php
                if (!isset($_SESSION["logged"]))
                {   
                    $html = <<<hm
                    <form action="validate.php" method="post">
                    <label for="username"> Username </label>
                    <input type="text" name="username" id="name"><br>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"><br><br>
                    <input type="submit" name="submit" value="Login" class="button is-primary">
                    </form>
                    hm;

                    echo $html;
                }
                else
                {
                    header("Location: view_records.php");
                }
        ?>
        
    </body>


</html>