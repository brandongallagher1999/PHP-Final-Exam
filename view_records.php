<?php
    require_once("session.php");
    require_once("db.php");
?>


<!DOCTYPE html>

<html>

    <head>
        <title>View Users Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css" crossorigin="anonymous">
    </head>

    <body>
        <?php
            if (isset($_SESSION["logged"]))
            {   
                if($_SESSION["logged"] == "true")
                {
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<th>ID</th>";
                    echo "<th>Username</th>";
                    echo "<th>Email</th>";
                    echo "<th>Title</th>";
                    echo "<th>Image</th>";
                    echo "<th>Text</th>";
                    echo "<th>Date</th>";
                    echo "</thead>";
                    echo "<tbody>";
                    $sql = "SELECT * FROM journal";

                    $statement = $db->prepare($sql);
                    $statement->execute();

                    $rows = $statement->fetchAll();
                    foreach($rows as $row)
                    {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["title"] . "</td>";
                        echo "<td><img src='uploads/" .$row["image"] . "' width='500' height='500'></td>";
                        echo "<td>" . $row["jtext"] . "</td>";
                        echo "<td>" . $row["ddate"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";

                }
            }
            else
            {
                header("Location: login.php");
            }
        ?>
    </body>

</html>