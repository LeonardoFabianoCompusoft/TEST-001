<h1>Adicionar Nova Tarefa</h1>

<form action="../public/add_task.php" method="POST">
    <div class="form-group">
        <label for="nome">Nome da Tarefa:</label><br>
        <input type="text" id="nome" name="nome" required>
    </div>

    <div class="form-group">
        <label for="description">Descrição:</label><br>
        <textarea id="description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="status">Status:</label><br>
        <select id="status" name="status">
            <option value="pendente">Pendente</option>
            <option value="Ativo">Ativo</option>
        </select>
    </div>

    <button type="submit" name="submit" class="btn-submit">Adicionar Tarefa</button>
</form>

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

    input[type="text"], textarea, select {
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

    .btn-submit {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
    }

    .btn-submit:hover {
        background-color: #45a049;
    }
</style>
