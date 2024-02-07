<?php

require_once 'config.php';
require_once 'functions.php';
$books = getAllBooks($mysqli);

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
                        <a class="nav-link" href="insert.php">Aggiungi un nuovo libro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="my-5 text-center">Elenco dei libri disponibili</h1>
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Anno di pubblicazione</th>
                    <th scope="col">Genere</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($books) {
                    foreach ($books as $key => $book) {
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $key + 1 ?>
                            </th>
                            <td>
                                <?= $book['titolo'] ?>
                            </td>
                            <td>
                                <?= $book['autore'] ?>
                            </td>
                            <td>
                                <?= $book['anno'] ?>
                            </td>
                            <td>
                                <?= $book['genere'] ?>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="delete.php?action=delete&id=<?= $book['id'] ?>"
                                    role="button">X</a>
                                <a class="btn btn-warning" href="edit.php?id=<?= $book['id'] ?>" role="button">EDIT</a>
                            </td>
                        </tr>
                    <?php }
                } ?>



                <!-- <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td><a class="btn btn-danger me-1" href="#" role="button">X</a><a class="btn btn-warning ms-1" href="#" role="button">EDIT</a></td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@mdo</td>
            <td><a class="btn btn-danger me-1" href="#" role="button">X</a><a class="btn btn-warning ms-1" href="#" role="button">EDIT</a></td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td><a class="btn btn-danger me-1" href="#" role="button">X</a><a class="btn btn-warning ms-1" href="#" role="button">EDIT</a></td>
            </tr>
        </tbody> -->
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>