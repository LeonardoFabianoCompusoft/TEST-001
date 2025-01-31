<?php
#Nova tarefa
function addTask($pdo, $name, $description, $status) {
    echo $name;
    echo $description;
    echo $status;

    $sql = "INSERT INTO task (nome, description, status) VALUES (:nome, :description, :status)";
    $stmt = $pdo->prepare($sql);
    
#Vincula os parâmetros
    $stmt->bindParam(':nome', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    
#Executa a declaração
    return $stmt->execute();
}

#Obter tarefas
function getTasks($pdo) {
    $sql = "SELECT * FROM task";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

#Atualizar tarefa
function updateTask($pdo, $id, $name, $description, $status) {
    $sql = "UPDATE task SET nome = :nome, description = :description, status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    
    return $stmt->execute();
}

#Excluir tarefa
function deleteTask($pdo, $id) {
    $sql = "DELETE FROM task WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':id', $id);
    
    return $stmt->execute();
}

?>
