

<?php

    require_once("db.php");
    
    try
    {
        $id = filter_input(INPUT_POST, "id");

        $sql = "DELETE FROM journal WHERE id = :id";
    
        $statement = $db->prepare($sql);
    
        $statement->bindParam(":id", $id);
    
        $statement->execute();
    
        echo "<p> Done </p>";

        $statement->closeCursor();
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }


?>

