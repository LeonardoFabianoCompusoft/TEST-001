<h1>Lista de Tarefas</h1>

<table>
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
                    <a href="edit.php?id=<?php echo $task['id']; ?>">Editar</a> | 
                    <a href="delete.php?id=<?php echo $task['id']; ?>">Excluir</a>
                </td>
            </tr>
            <tr><td colspan="2"><hr></td></tr> <!-- Linha separadora entre tarefas -->
        <?php endforeach; ?>
    </tbody>
</table>

<a href="../public/add.php">Criar novo formulário</a>
