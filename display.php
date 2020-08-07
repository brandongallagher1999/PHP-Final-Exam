<!DOCTYPE html>

<html>

    <head>
        <title>Display Info Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css" crossorigin="anonymous">
    </head>

    <body>
        
        <table class="table">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Username
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Text
                    </th>
                </tr>
            </thead>

            <tbody>

            <?php
                require("db.php");

                $statement = $db->prepare("SELECT * FROM journal");

                $statement->execute();

                $rows = $statement->fetchAll();

                foreach($rows as $row)
                {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["text"] . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </body>



</html>
