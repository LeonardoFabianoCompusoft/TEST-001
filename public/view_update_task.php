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

#Verifica se a tarefa foi encontrada
if(!$task) {
    echo "Tarefa não encontrada";
    exit;
}
?>
<html>
<head>
    <title>Editar Tarefa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 30px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            max-width: 500px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #007bff;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form action="./update_task.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($task['nome']); ?>" required><br>
        </div>
        <div class="form-group">
            <label>Descrição:</label>
            <textarea name="description" required><?php echo htmlspecialchars($task['description']); ?></textarea><br>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <input type="text" name="status" value="<?php echo htmlspecialchars($task['status']); ?>" required><br>
        </div>
        <button type="submit" name="submit">Atualizar</button>
    </form>
    <div class="back-link">
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>

