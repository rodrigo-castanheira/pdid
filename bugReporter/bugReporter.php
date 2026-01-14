<?php include "dbHandler.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bugreporter.css">
</head>
<body>
    <h1>Bug Reporter</h1>

    <table border="1">
        <tr>
            <th>Product Name</th>
            <th>Version</th>
            <th>Hardware</th>
            <th>OS</th>
            <th>Frequency</th>
            <th>Solutions</th>
            <th>Edit Link</th>
            <th>Delete</th>
        </tr>

    <?php

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['product']}</td>
                    <td>{$row['version']}</td>
                    <td>{$row['hardware']}</td>
                    <td>{$row['os']}</td>
                    <td>{$row['frequency']}</td>
                    <td>{$row['solution']}</td>
                    <td><a href='bugReporterInput.php?id={$row['id']}'>Edit</a></td>
                    <td><a href='deletebug.php?id={$row['id']}'>Delete</a></td>
                  </tr>";
        }

    ?>
    </table>
    
</body>
</html>