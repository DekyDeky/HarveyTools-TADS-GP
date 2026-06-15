
<!DOCTYPE html>
<html>
<head>
    <title>Select Campaign</title>
</head>
<body>

<h1>Select Campaign</h1>

<section class="bestiary">
        <?php foreach($result as $row):?>

            <a class="bestiary-button" href="/bestiario?id=<?=$row['campID']?>"><?=$row['nomeCamp']?></a>

        <?php endforeach; ?>

    <br><br>
</section class="bestiary">

</body>
</html>