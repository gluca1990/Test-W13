<?php 

    require_once 'config.php';
    require_once 'functions.php';

    if((isset($_REQUEST['action']) && $_REQUEST['action'] === 'update') && isset($_GET['id']) ) {
        echo 'voglio modificare id ' . $_GET['id'];
        $book = getBookByID($mysqli);
        #print_r($book);
    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="myLibrary">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>myLibrary</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">myLibray</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aggiungi un nuovo libro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="my-5 text-center">
            <?php if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){echo 'Modifica un libro esistente';} else{echo 'Inserisci un nuovo libro';}?>
        </h1>

        <form method="post" action="<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){echo "gestione.php?action=update&id=". $_GET['id'];}  else{echo 'gestione.php';}?>" class="my-5">
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" value="<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){
                    echo($book['titolo']);} else {echo '';}?>" class="form-control" id="titolo" placeholder="Titolo..." name="titolo">
            </div>
            <div class="mb-3">
                <label for="autore" class="form-label">Autore</label>
                <input type="text" value="<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){
                    echo($book['autore']);} else {echo '';}?>" class="form-control" id="autore" placeholder="Autore..." name="autore">
            </div>
            <div class="mb-3">
                <label for="anno" class="form-label">Anno di pubblicazione</label>
                <input type="number" value="<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){
                    echo($book['anno']);} else {echo '';}?>" class="form-control" id="anno" placeholder="Anno di pubblicazione..." name="anno">
            </div>
            <div class="mb-3">
                <label for="genere" class="form-label">Genere</label>
                <input type="text" value="<?php if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){
                    echo($book['genere']);} else {echo '';}?>" class="form-control" id="genere" placeholder="Genere..." name="genere">
            </div>
            <button type="submit" class="btn btn-dark">
                <?php if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){echo 'Modifica';} else{echo 'Inserisci';}?>
            </button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>