<?php
include_once '../../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    # Buscar apenas pelo email
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    # Validar se o usuário existe e se a senha está correta
    if ($user && md5($senha) === $user['senha']) {
        $_SESSION['email'] = $user['email'];

        # Redireciona para a página de adicionar tarefa
        header("Location: ../public/add_index.php");
        exit;
    } else {
        $erro = "Email ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
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
    width: 100%;
    max-width: 400px;
    animation: fadeIn 0.5s ease-in-out;
}

h2 {
    margin-bottom: 1rem;
    color: #333;
    font-weight: 600;
}

input {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 2px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    transition: 0.3s;
}

input:focus {
    border-color: #007BFF;
    outline: none;
}

button {
    width: 100%;
    padding: 12px;
    background: #007BFF;
    border: none;
    color: #fff;
    font-size: 1rem;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s, transform 0.2s;
}

button:hover {
    background: #0056b3;
    transform: scale(1.05);
}

a.button {
    display: block;
    margin-top: 10px;
    padding: 12px;
    background: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: background 0.3s, transform 0.2s;
}

a.button:hover {
    background: #218838;
    transform: scale(1.05);
}

.error {
    color: red;
    margin-bottom: 10px;
    font-weight: bold;
}

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
    <div class="container">
        <h2>Login</h2>
        <?php if (!empty($erro)) echo "<p class='error'>$erro</p>"; ?>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <a href="../views/view_reg.php" class="button">Registro</a>
        </form>
    </div>
</body>
</html>

