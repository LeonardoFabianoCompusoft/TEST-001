
<?php

include_once '../includes/connection.php';
include_once '../includes/task_functions.php';

#Tarefas
session_start();
$email = $_SESSION['email'];
if (!empty($email)) {
    $user = getUser($pdo, $email);
    if (!empty($user)) {
        $tasks = getTasks($pdo, $user['id']);
    }
}

include_once '../templates/header.php';

include_once '../public/views/view_task_list.php';

include_once '../templates/footer.php';
?>