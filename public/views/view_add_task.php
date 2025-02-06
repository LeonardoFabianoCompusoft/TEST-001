<?php
session_start();

$email = $_SESSION['email'];
if (empty($email)) {
    header("Location: ./index.php");
    exit;
}
?>
<div class="container">
    <div class="cookie-message">
        <?php
        echo '<hr>';
        if (isset($_COOKIE['mensagem'])) {
            echo $_COOKIE['mensagem'];
            setcookie("mensagem", '', time() - 3600, "/");
        }
        echo '<hr>';
        ?>
    </div>
    <h1>Adicionar Nova Tarefa</h1>
    <form action="../public/content/add_task.php" method="POST">
        <div class="form-group">
            <label for="nome">Nome da Tarefa:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="pendente">Pendente</option>
                <option value="Ativo">Ativo</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn-submit">Adicionar Tarefa</button>
        <a href="../views/view_task_list.php" class="btn-submit btn-list">Lista</a>
        <a href="../../index.php" class="logout-btn">Encerrar sessão</a>
    </form>
</div>
<style>
   /* Estilos Gerais */
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
    height: 100vh;
    background: linear-gradient(135deg, #007BFF, #004494);
    padding: 20px;
}

.container {
    background: #fff;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 100%;
    max-width: 500px;
    animation: fadeIn 0.5s ease-in-out;
    position: relative;
}

h1 {
    margin-bottom: 1.5rem;
    color: #222;
    font-weight: 700;
    text-align: center;
}

/* Estilos do Formulário */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    font-weight: bold;
    color: #444;
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
textarea,
select {
    width: 100%;
    padding: 12px;
    border: 2px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s;
    background: #f9f9f9;
}

input:focus,
textarea:focus,
select:focus {
    border-color: #007BFF;
    outline: none;
    background: #fff;
}

textarea {
    resize: vertical;
    height: 120px;
}

/* Botões */
.btn-submit {
    width: 100%;
    padding: 12px;
    background: #28a745;
    border: none;
    color: white;
    font-size: 1rem;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
    display: inline-block;
    text-align: center;
    text-decoration: none;
    margin-top: 10px;
    font-weight: bold;
}

.btn-submit:hover {
    background: #218838;
    transform: scale(1.05);
}

.btn-list {
    background: #007BFF;
}

.btn-list:hover {
    background: #0056b3;
}

/* Estilo do botão de Encerrar Sessão */
.logout-btn {
    display: block;
    width: 100%;
    padding: 12px;
    background: #dc3545;
    color: white;
    font-size: 1rem;
    border-radius: 8px;
    text-align: center;
    text-decoration: none;
    font-weight: bold;
    margin-top: 10px;
    transition: background 0.3s, transform 0.2s;
}

.logout-btn:hover {
    background: #c82333;
    transform: scale(1.05);
}

/* Estilo para mensagens de cookies */
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

/* Animação */
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