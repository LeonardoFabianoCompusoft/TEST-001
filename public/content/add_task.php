<h1>Adicionar Nova Tarefa</h1>

<form action="add_task.php" method="POST">
    <label for="name">Nome da Tarefa:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="description">Descrição:</label><br>
    <textarea id="description" name="description"></textarea><br><br>

    <label for="status">Status:</label><br>
    <select id="status" name="status">
        <option value="pendente">Pendente</option>
        <option value="concluída">Concluída</option>
    </select><br><br>

    <button type="submit" name="submit">Adicionar Tarefa</button>
</form>
