<?php

include("connectionBD.php");

$sql = "SELECT campID, nomeCamp FROM campanhas";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Campaign</title>
</head>
<body>

<h1>Select Campaign</h1>

<form action="viewBeastController.php" method="GET">

    <select name="campID" required>

        <option value="">Select Campaign</option>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <option value="<?= $row['campID'] ?>">
                <?= $row['nomeCamp'] ?>
            </option>

        <?php } ?>

    </select>

    <br><br>

    <button type="submit">Bestiary</button>

</form>

</body>
</html>