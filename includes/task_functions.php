<?php

#Nova tarefa
function addTask($pdo, $name, $description, $status) {
    $sql = "INSERT INTO tasks (name, description, status) VALUES (:name, :description, :status)";
    $stmt = $pdo->prepare($sql);
    
#Vincula os parâmetros
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    
#Executa a declaração
    return $stmt->execute();
}

#Obter tarefas
function getTasks($pdo) {
    $sql = "SELECT * FROM tasks";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
