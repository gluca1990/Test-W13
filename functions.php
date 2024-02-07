<?php

/* R - Read */
function getAllBooks($mysqli)
{
    $result = [];
    $sql = "SELECT * FROM books;";
    $res = $mysqli->query($sql); // return un mysqli result
    if ($res) { // Controllo se ci sono dei dati nella variabile $res
        while ($row = $res->fetch_assoc()) { // Trasformo $res in un array associativo
            $result[] = $row; // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
        }
    }
    return $result;
}
/* C - Create */
function insertBook($mysqli, $titolo, $autore, $anno, $genere)
{
    $sql = "INSERT INTO books (titolo, autore, anno, genere) 
                VALUES ('$titolo', '$autore', '$anno', '$genere');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        header('Location: http://localhost/Test-W13/index.php');
    }
}
/* D - Delete */
function removeBook($mysqli, $id)
{
    if (!$mysqli->query('DELETE FROM books WHERE id = ' . $id)) {
        echo ($mysqli->connect_error);
    } else {
        header('Location: http://localhost/Test-W13/index.php');
    }
}
/* U - Update */
function getBookByID($mysqli)
{
    $sql = "SELECT * FROM books WHERE id = " . $_GET['id'];
    $res = $mysqli->query($sql); // return un mysqli result
    if ($res) { // Controllo se ci sono dei dati nella variabile $res 
        $result = $res->fetch_assoc(); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array  
    }
    return $result;
}

function editBook($mysqli, $id, $titolo, $autore, $anno, $genere)
{
    /* "UPDATE `books` SET `titolo` = " . $titolo . ", `autore` = " . $autore . ", `anno` = " . $anno . ", `genere` = " . $genere ." WHERE `books`.`id` = " . $id; */

    $sql = "UPDATE books SET 
            titolo = '" . $titolo . "', 
            autore = '" . $autore . "', 
            anno = '" . $anno . "', 
            genere = '" . $genere . "'
            WHERE books.id = " . $id . ";";
    #$mysqli->query($sql);
    if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
    else { header('Location: http://localhost/Test-W13/index.php');}
}
?>