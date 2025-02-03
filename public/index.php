<?php

include_once '../includes/connection.php';
include_once '../includes/task_functions.php';

#Tarefas
$tasks = getTasks($pdo);

include_once '../templates/header.php';

include_once '../public/views/view_task_list.php';

include_once '../templates/footer.php';
?>
