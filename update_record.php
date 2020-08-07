
<?php

    require_once("db.php");
    try
    {
        $id = filter_input(INPUT_POST, "id");
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $jtext = filter_input(INPUT_POST, "text");
        $ddate = filter_input(INPUT_POST, "date");
        $title = filter_input(INPUT_POST, "title");

        $sql = "UPDATE journal SET username = :username, email = :email, title = :title, jtext = :jtext, ddate = :ddate WHERE id = :id";

        $statement = $db->prepare($sql);

        $statement->bindParam(":id", $id);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":jtext", $jtext);
        $statement->bindParam(":ddate", $ddate);
        $statement->bindParam("title", $title);

        $statement->execute();

        $statement->closeCursor();

        echo "<p> Done </p>";


    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }

?>
