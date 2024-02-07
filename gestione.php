<?php

require_once 'config.php';
require_once 'functions.php';

$book = [
    'id' => $_REQUEST['id'],
    'titolo' => $_REQUEST['titolo'],
    'autore' => $_REQUEST['autore'],
    'anno' => $_REQUEST['anno'],
    'genere' => $_REQUEST['genere'],
];

print_r($book);

if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){
    editBook($mysqli, $book['id'], $book['titolo'], $book['autore'], $book['anno'], $book['genere']);
}
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] === 'delete') {
    removeBook($mysqli, $_REQUEST['id']);
}

else {
    insertBook($mysqli, $book['titolo'], $book['autore'], $book['anno'], $book['genere']);
};


?>