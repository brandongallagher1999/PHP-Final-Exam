<?php

    require_once("db.php");
    $fileName = "";

    try
    {
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $title = filter_input(INPUT_POST, "title");
        $text = filter_input(INPUT_POST, "text");
        $password = filter_input(INPUT_POST, "password");
        $date = filter_input(INPUT_POST, "date");


        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $fileName = $_FILES["image"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset($_POST["submit"]))
        {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false)
            {
                copy($_FILES['image']['tmp_name'], $target_file);
                $uploadOk = 1;
                header("Location: login.php");
            }
            else
            {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }


    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
    

    try //database entry
    {
        $sql = "INSERT INTO journal (username, email, title, jtext, image, ddate, password) VALUES (:username, :email, :title, :text, :image, :date, :password)";

        $statement = $db->prepare($sql);
    
        // hash password
        $newPass = password_hash($password, PASSWORD_DEFAULT);

        $statement->bindParam(":username", $username);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":title", $title);
        $statement->bindParam(":text", $text);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":password", $newPass);
        $statement->bindParam(":image", $fileName);
    
        $statement->execute();
    
        echo "<p> Done </p>";
    
        $statement->closeCursor(); // close() is an old depricated method
    } 
    catch(Exception $e)
    {
        echo $e->getMessage();
    }



?>