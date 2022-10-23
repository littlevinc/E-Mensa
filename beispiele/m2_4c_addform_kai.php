<?php
/**
 * Praktikum DBWT. Autoren:
 * Kai, Fedin, 3515541
 * Luke, Braun, 3541708
 */

include 'm2_4a_standardparameter_kai.php';
echo('');

?>

<!DOCTYPE html >
<html lang="de">

<head>
<title>Standardparameter</title>
<meta charset="UTF-8">
</head>

<body>

<form method="get"> <formset>
        <input type="text" name="int1" value="<?php if(!empty($_GET['int1'])){ echo $_GET['int1'];} ?>">
        <input type="text" name="int2" value="<?php if(!empty($_GET['int1'])){ echo $_GET['int2'];} ?>">
        <input type="submit" name="Addieren">
    </formset>
</form>
<p>Ergebnis: <?php if(!empty($_GET['int1'])){ echo addieren($_GET['int1'], $_GET['int2']);} ?></p>


</body>
</html>

