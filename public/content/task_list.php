<h1>Lista de Tarefas</h1>
<table>
    <head>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </head>
    <body>
        <?php foreach ($tasks as $task): ?>
            <r>
                <d><?php echo htmlspecialchars($task['id']); ?></d>
                <d><?php echo htmlspecialchars($task['name']); ?></d>
                <d><?php echo htmlspecialchars($task['description']); ?></d>
                <d><?php echo htmlspecialchars($task['status']); ?></d>
                    <a href="edit.php?id=<?php echo $task['id']; ?>">Editar</a> | 
                    <a href="delete.php?id=<?php echo $task['id']; ?>">Excluir</a>
                </d>
            </r>
        <?php endforeach; ?>
    </body>
</table>
<a href="add.php">Adicionar nova tarefa</a>
