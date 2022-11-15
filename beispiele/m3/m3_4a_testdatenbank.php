<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>m3_4a_testdatenbank</title>
    <style>
        body {
            display: grid;
            place-items: center;
            padding-top: 20%;
            margin: 0;
            font-family: sans-serif;
        }

        table {
            border: 1px solid black;
        }

        td {
            width: 300px;
        }

        thead {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <?php
    $link = mysqli_connect("localhost","root","root", "emensawerbeseite");

    if(!$link) {
        echo "Vebindung fehlgeschlagen", mysqli_connect_error();
        exit();
    }

    $sql = "SELECT id, name, beschreibung FROM gericht";

    $result = mysqli_query($link, $sql);

    if(!$result) {
        echo "Fehler während der Abfrage: ", mysqli_error($link);
        exit();
    }

    while($row = mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
    }

    mysqli_free_result($result);
    mysqli_close($link);
    ?>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Beschreibung</td>
            </tr>
        </thead>


        <?php foreach($resultset as $results) : ?>

        <tr>
            <td><?php echo $results['id']?></td>
            <td><?php echo $results['name']?></td>
            <td><?php echo $results['beschreibung']; ?></td>
        </tr>

        <?php endforeach;?>




    </table>





</body>
</html>





