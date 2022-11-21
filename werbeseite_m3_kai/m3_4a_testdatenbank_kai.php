<?php
$link = mysqli_connect("localhost", "root", "root", "emensawerbeseite");

if(!$link){
    echo "Connection failed" , mysqli_connect_error();
}

$sql = "SELECT name, beschreibung FROM gericht ORDER BY name ASC LIMIT 5;";

$result = mysqli_query($link, $sql);

if(!$result){
    echo "Feher in der quuery" . mysqli_error($link);
}


?>

<table>
    <th>
        <td></td>
        <td></td>
        <td></td>
    </th>
    <?php
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['beschreibung'] . "</td>";
            echo "</tr>";
        }
    ?>
</table>

<?php

mysqli_free_result($result);
mysqli_close($link);

?>


