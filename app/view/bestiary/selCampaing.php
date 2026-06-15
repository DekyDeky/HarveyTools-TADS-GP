
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Campaign</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/bestiary/bestiary.css">
</head>
<body>

<?php include __DIR__ . '/../components/header.php'; ?>


<section class="d-flex flex-column align-items-center gap-2">
    <h1 class="text-center">Select Campaign</h1>
    <a class="btn btn-general" href="/criar-campanha">Create Campaign</a>
</section>


<section class="bestiary p-5 d-flex flex-column align-items-center gap-2">
        <?php foreach($result as $row):?>

            <a class="btn btn-general campaing-item" href="/campanha?id=<?=$row['campID']?>"><?=$row['nomeCamp']?></a>

        <?php endforeach; ?>

    <br><br>
</section>

</body>
</html>