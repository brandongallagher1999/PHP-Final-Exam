<?php
    require_once("session.php");
    require_once("db.php");

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, "password");

    try
    {
        $sql = "SELECT * FROM journal WHERE username = :username";

        $statement = $db->prepare($sql);
        $statement->bindParam(":username", $username);
        echo "<p>" . $password . "</p>";
        $statement->execute();
    
        $rows = $statement->fetchAll();
    

        if (count($rows) > 0)
        {
            if(password_verify($password, $rows[0]["password"]))
            {
                $_SESSION["logged"] = "true";
                header("Location: index.php");
            }
        }
        else
        {
            echo "<p> does not exist </p>";
        }

        $statement->closeCursor();

    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }



?>