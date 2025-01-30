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
?>
