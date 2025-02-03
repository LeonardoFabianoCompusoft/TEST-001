
<h1>Lista de Tarefas</h1>

<span>
    <?php 
        echo '<hr>';
        if(isset($_COOKIE['mensagem'])){
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
            <tr><td colspan="2"><hr></td></tr> <!-- Linha separadora entre tarefas -->
        <?php endforeach; ?>
    </tbody>
</table>

<a href="../public/add_index.php" class="btn-create">Criar novo formulário</a>

<style>
    .task-table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    .task-table th, .task-table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .task-table th {
        background-color: #f2f2f2;
        color: #333;
    }

    a {
        text-decoration: none;
    }

    .btn-edit, .btn-delete, .btn-create {
        padding: 8px 16px;
        color: #fff;
        border-radius: 4px;
        font-size: 14px;
        margin: 5px;
    }

    .btn-edit {
        background-color: #007bff;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }

    .btn-delete {
        background-color: #dc3545;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .btn-create {
        background-color: #28a745;
    }

    .btn-create:hover {
        background-color: #218838;
    }
</style>
