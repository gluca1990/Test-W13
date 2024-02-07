<?php

require_once 'config.php';
require_once 'functions.php';

if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'delete') {
    removeBook($mysqli, $_REQUEST['id']);
    #exit(header('Location: http://localhost/S1L4_SQL/Esercizio/'));
}

?>