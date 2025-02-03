<!DOCTYPE html>
<?php

include_once '../../includes/connection.php';
include_once '../../includes/task_functions.php';

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
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    background: linear-gradient(135deg, #007BFF, #0056b3);
    padding: 20px;
}

.container {
    background: #fff;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 90%;
    max-width: 500px;
    animation: fadeIn 0.5s ease-in-out;
}

h1 {
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
    color: #333;
    text-align: center;
}

/* Formulário de edição de tarefa */
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

input[type="text"], textarea, select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
}

textarea {
    resize: vertical;
    height: 120px;
}

button[type="submit"] {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 12px 25px;
    cursor: pointer;
    border-radius: 6px;
    font-size: 16px;
    transition: background 0.3s;
}

button[type="submit"]:hover {
    background-color: #218838;
    transform: scale(1.05);
}

/* Link para voltar */
.back-link {
    margin-top: 20px;
    text-align: center;
}

.back-link a {
    color: #007bff;
    text-decoration: none;
    font-size: 16px;
}

.back-link a:hover {
    text-decoration: underline;
}

/* Animação de fade-in */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </style>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form action="../../public/content/update_task.php" method="POST">
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
            <select id="status" name="status">
            <option value="pendente">Pendente</option>
            <option value="Ativo">Ativo</option>
            <option value="Finalizado">Finalizado</option>
        </select>
        </div>
        <button type="submit" name="submit">Atualizar</button>
    </form>
    <div class="back-link">
        <a href="../list_index.php">Voltar</a>
    </div>
</body>
</html>

