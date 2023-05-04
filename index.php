<?php 
/* 
Descrizione
Partiamo da questo array di hotel:
https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate per steps:
-Prima stampate in pagina i dati, senza preoccuparvi dello stile.
-Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus: 1
Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)

*/
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$checkParking = ($_GET["parking"]);
$minVote = ($_GET["vote"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        form {
            font-size: 0.9rem;
        }
        .votation input {
            width: fit-content;
            height: fit-content;
            font-size: 0.8rem;
        }
        .btn {
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1 class="py-4">PHP Hotels</h1>

        <form method="get" class="d-flex align-items-center mb-4">
            <div class="parking">
                <input class="form-check-input" type="checkbox" value="true" id="parking" name="parking">
                <label class="form-check-label" for="parking">
                    Filter hotels with parking
                </label> 
            </div> 
            <div class="votation ps-5">
                <label for="vote" class="form-label d-inline-block m-0">
                    Filter by minimum vote
                </label>
                <input type="number" class="form-control d-inline-block px-2 py-1" id="vote" name="vote" min="1" max="5">
            </div>
            <button type="submit" class="btn btn-dark px-2 py-1 mx-3">Filter</button>
        </form>


        <table class="table">
            <thead>
                <?php foreach ($hotels[0] as $key => $value) : ?>
                    <th scope="col"><?= ucwords(str_replace('_', ' ', $key)) ?></th>
                <?php endforeach?>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) : ?>
                    <tr>
                        <?php foreach ($hotel as $key => $value) : ?>
                            <?php if ($hotel["parking"] == $checkParking || $checkParking === null) : ?>
                                <?php if ($hotel["vote"] >= $minVote) : ?>
                                    <?php if ($value === true) : ?>
                                        <!-- se un value è uguale a true a schermo verrà mostrato "yes" -->
                                        <td>Yes</td>
                                    <?php elseif ($value === false) : ?>
                                        <!-- se un value è uguale a false a schermo verrà mostrato "no" -->
                                        <td>No</td>
                                    <?php else : ?>
                                        <!-- altrimenti verrà mostrato il value così com'è -->
                                        <td><?= $value ?></td>
                                    <?php endif ?>
                                <?php endif ?>
                                <!-- /if statement che verifica se un hotel rispetta il filtro vote scelto dall'user -->
                            <?php endif ?>
                            <!-- /if statement che verifica se un hotel rispetta il filtro parking scelto dall'user -->
                        <?php endforeach ?>
                        <!-- /foreach per ciclare all'interno del singolo hotel ed avere keys e values -->
                    </tr>
                <?php endforeach ?>
                <!-- /foreach per ciclare all'interno dell'array $hotels  -->
            </tbody>
        </table>

    </div>
</body>
</html>