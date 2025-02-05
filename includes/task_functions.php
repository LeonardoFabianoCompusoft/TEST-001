<?php

#Nova tarefa
function addTask($pdo, $name, $description, $status)
{
    echo $name;
    echo $description;
    echo $status;

    $sql = "INSERT INTO task (nome, description, status) VALUES (:nome, :description, :status)";
    $stmt = $pdo->prepare($sql);

    #Executa a declaração

    $executou = $stmt->execute([
        'nome' => $name,
        'description' => $description,
        'status' => $status
    ]);
    if($executou){
        $id = $pdo->lastInsertId();
        return $id;
    }else{
        return false;
    }
}

#Obter tarefas
function getTasks($pdo, $id_user)
{
    $sql = "SELECT * FROM task t INNER JOIN controle c ON t.id = c.id_task WHERE c.id_user = :id_user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            'id_user' => $id_user
        ]
    );

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

#Atualizar tarefa
function updateTask($pdo, $id, $name, $description, $status)
{
    $sql = "UPDATE task SET nome = :nome, description = :description, status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);

    return $stmt->execute();
}

#Excluir tarefa
function deleteTask($pdo, $id)
{
    $sql = "DELETE FROM task WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    return $stmt->execute();
}

#buscar usuario pelo email
function getUser($pdo, $email)
{
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

#buscar usuario, task e controle pelo id
function addControle($pdo, $id_user, $id_task){
    $sql = "INSERT INTO controle (id_user, id_task) VALUES (:id_user, :id_task)";
    $stmt = $pdo->prepare($sql);

    $executou = $stmt->execute([
        'id_user' => $id_user,
        'id_task' => $id_task
    ]);
    return $executou;
}

define('CHAVE_ADMIN', 'teste@123');