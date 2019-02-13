<?php
    /*
     * todo: testing/fixing
     *
     */

    require_once("PDOconnect.php");
require_once ("nav.php");

//todo: https://datatables.net/manual/installation

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="basicCss.css">


        <script src="https://code.jquery.com/jquery-3.3.1.js"
                integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>

            <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            } );
        </script>




        <title>Basic web page</title>
    </head>

    <body>
        <h1>Table</h1>

        <?php

        class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "\n";
            }
        }



        $sql = "SELECT * ";
        $sql .= "FROM table1 ";

        $stmt = $conn->prepare($sql);

        $conn = null;

        if ($stmt->execute()) : ?>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Image Directory</th>
                        <th>Extra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $stmt->fetch()) : ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['message'] ?></td>
                            <td>
                                <button onclick="displayImage(<?php echo $row['id'] ?>)">Image</button>
                                    <a href="<?php echo $row['imageDirectory'] ?>" download>
                                        <img src="<?php echo $row['imageDirectory'] ?>"
                                             id="<?php echo "diplayImage" . $row['id'] ?>" class="image">
                                    </a>
                                <button onclick="displayDirectory(<?php echo $row['id'] ?>)">Directory</button>
                                    <p id="<?php echo "displayDirectory" . $row['id'] ?>"
                                       class="image"><?php echo $row['imageDirectory'] ?>
                                    </p>
                            </td>
                            <td>
                                <!-- FORM EDIT + DELETE -->
                                <form action="editPage.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <input type="submit" value="Edit">
                                </form>
                                <form action="delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Unable to retrieve data.</p>
        <?php endif; ?>

    </body>
</html>



