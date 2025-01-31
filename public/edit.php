<!DOCTYPE html>
<?php

include_once '../includes/connection.php';
include_once '../includes/task_functions.php';

#Verifica se id foi passado
if (!isset($_GET['id'])) {
    echo "ID foi não passado";
    exit;
}

$id = $_GET['id'];

#Obtém a tarefa
$sql = "SELECT * FROM task WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id' => $id
]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);


if(!$task) {
    echo "Tarefa não encontrada";
    exit;
}
?>
<html>
<head>
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form action="./update_task.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($task['nome']); ?>" required><br>
        <label>Descrição:</label>
        <textarea name="description" required><?php echo htmlspecialchars($task['description']); ?></textarea><br>
        <label>Status:</label>
        <input type="text" name="status" value="<?php echo htmlspecialchars($task['status']); ?>" required><br>
        <button type="submit" name="submit">Atualizar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>