<?php

$pagina = isset($_GET['p']) ? $_GET['p'] : 'home/index';
require_once 'he_fo/header.php';
echo '<br>';
require_once  $pagina . '.php';
require_once 'he_fo/footer.php';
