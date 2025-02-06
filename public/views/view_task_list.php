<?php
session_start();
$email = $_SESSION['email'];
if (empty($email)) {
    header("Location: ./index.php");
    exit;
}else{
    $user = getUser($pdo, $email);
    if (empty($user)) {
        header("Location: ./index.php");
        exit;
    }else {
        $nome = $user['nome'];
        $tasks = getTasks($pdo, $user['id']);
        if(empty($tasks)){
            header("Location: ./add_index.php");
            setcookie("mensagem", "Nenhuma tarefa encontrada!", time() + 3600, "/");
            exit;
        }
    }
}
?>

<h1 class="h1">Lista de Tarefas</h1>

<div class="welcome-message">
    <label>Bem vindo a sua area de Tarefas: <?php echo $nome; ?></label>
</div>

<span class="cookie-message">
    <?php
    echo '<hr>';
    if (isset($_COOKIE['mensagem'])) {
        echo $_COOKIE['mensagem'];
        setcookie("mensagem", '', time() - 3600, "/");
    }
    echo '<hr>';
    ?>
</span>

<table class="task-table">

    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <th>Nome:</th>
                <td><?php echo htmlspecialchars($task['nome']); ?></td>
            </tr>
            <tr>
                <th>Descrição:</th>
                <td><?php echo htmlspecialchars($task['description']); ?></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td><?php echo htmlspecialchars($task['status']); ?></td>
            </tr>
            <tr>
                <th>Ações:</th>
                <td>
                    <a href="../public/views/view_update_task.php?id=<?php echo $task['id']; ?>" class="btn-edit">Editar</a> |
                    <a href="../public/content/delete_task.php?id=<?php echo $task['id']; ?>" class="btn-delete">Excluir</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr> <!-- Linha separadora entre tarefas -->
        <?php endforeach; ?>
    </tbody>
</table>

<a href="../public/add_index.php" class="btn-create">Criar novo formulário</a>
<a href="../index.php" class="logout-btn">Encerrar sessão</a>

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
        padding: 1.5rem;
        /* Diminuído o padding */
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 100%;
        max-width: 600px;
        /* Diminuímos o tamanho máximo */
        animation: fadeIn 0.5s ease-in-out;
    }

    h1 {
    margin-bottom: 1.5rem;
    color: #222;
    font-weight: 700;
    text-align: center;
    font-size: 1.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}
    .logout-btn {
    display: inline-block;
    width: fit-content;
    padding: 8px 16px;
    background: #dc3545;
    color: white;
    font-size: 13px;
    border-radius: 6px;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    margin: 10px auto 0;
    transition: background 0.3s, transform 0.2s;
}

    /* Tabela de tarefas */
    .task-table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .task-table th,
    .task-table td {
        padding: 12px;
        /* Reduzido o padding das células */
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    .task-table th {
        background-color: #f8f9fa;
        color: #333;
        font-weight: bold;
    }

    .task-table tr:last-child td {
        border-bottom: none;
    }
    .cookie-message {
    background: #ffcc00;
    color: #333;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

    /* Botões de ação */
    .btn-edit,
    .btn-delete,
    .btn-create {
        display: inline-block;
        padding: 8px 16px;
        /* Diminuído o padding dos botões */
        color: #fff;
        border-radius: 6px;
        font-size: 13px;
        /* Tamanho da fonte reduzido */
        text-align: center;
        transition: background 0.3s, transform 0.2s;
        text-decoration: none;
        margin-top: 10px;
    }

    .btn-edit {
        background: #007bff;
    }

    .btn-edit:hover {
        background: #0056b3;
        transform: scale(1.05);
    }

    .btn-delete {
        background: #dc3545;
    }

    .btn-delete:hover {
        background: #c82333;
        transform: scale(1.05);
    }

    .btn-create {
        background: #28a745;
        display: block;
        width: fit-content;
        margin: 20px auto 0;
    }
    .welcome-message {
    background: #f8f9fa;
    color: #333;
    padding: 12px;
    border-radius: 8px;
    font-weight: bold;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    font-size: 1rem;
    margin-bottom: 15px;
}

    .btn-create:hover {
        background: #218838;
        transform: scale(1.05);
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