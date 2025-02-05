<?php
// Definindo a raiz do projeto
define('RAIZ', __DIR__);

// Definindo o domínio padrão
define('DOMINIO', 'http://localhost/gent/public');

include_once RAIZ.'/includes/connection.php';
include_once RAIZ.'/includes/task_functions.php';
include_once RAIZ.'/templates/header.php';
include_once RAIZ.'/public/views/view_home_login.php';
include_once RAIZ.'/templates/footer.php';

