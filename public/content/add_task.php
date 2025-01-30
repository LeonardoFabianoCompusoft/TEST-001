<h1>Adicionar Nova Tarefa</h1>

<form action="../public/add_tarefa.php" method="POST">
    <label for="nome">Nome da Tarefa:</label><br>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="description">Descrição:</label><br>
    <textarea id="description" name="description"></textarea><br><br>

    <label for="status">Status:</label><br>
    <select id="status" name="status">
        <option value="pendente">Pendente</option>
        <option value="Ativo">Ativo</option>
    </select><br><br>

    <button type="submit" name="submit">Adicionar Tarefa</button>
</form>
