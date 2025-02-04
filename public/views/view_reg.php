<?php
include_once '../../includes/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $confirmar_senha = trim($_POST['confirmar_senha']);

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar_senha) {
        $erro = "As senhas não coincidem!";
    } else {
        // Verifica se o e-mail já está cadastrado
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        
        if ($stmt->fetch()) {
            $erro = "Este e-mail já está cadastrado!";
        } else {
            // Insere o usuário no banco sem hash da senha
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
            $cadastro = $stmt->execute([
                'nome' => $nome,
                'email' => $email,
                'senha' => $senha
            ]);

            if ($cadastro) {
                $sucesso = "Cadastro realizado com sucesso! <a href='view_home_login.php'>Faça login</a>";
            } else {
                $erro = "Erro ao cadastrar. Tente novamente!";
            }
        }
    }
}




#registro com codificação de senha estava dando erro de senha incorreta no login


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $nome = trim($_POST['nome']);
//     $email = trim($_POST['email']);
//     $senha = trim($_POST['senha']);
//     $confirmar_senha = trim($_POST['confirmar_senha']);

//     // Verifica se as senhas coincidem
//     if ($senha !== $confirmar_senha) {
//         $erro = "As senhas não coincidem!";
//     } else {
//         // Verifica se o e-mail já está cadastrado
//         $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
//         $stmt->execute(['email' => $email]);
        
//         if ($stmt->fetch()) {
//             $erro = "Este e-mail já está cadastrado!";
//         } else {
//             // Hash seguro da senha
//             $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

//             // Insere o usuário no banco
//             $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
//             $cadastro = $stmt->execute([
//                 'nome' => $nome,
//                 'email' => $email,
//                 'senha' => $senha_hash
//             ]);

//             if ($cadastro) {
//                 $sucesso = "Cadastro realizado com sucesso! <a href='view_home_login.php'>Faça login</a>";
//             } else {
//                 $erro = "Erro ao cadastrar. Tente novamente!";
//             }
//         }
//     }
// }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    width: 100%;
    max-width: 400px;
    animation: fadeIn 0.5s ease-in-out;
}

h2 {
    margin-bottom: 1rem;
    color: #333;
    font-size: 1.6rem;
}

input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

input:focus {
    border-color: #007bff;
    outline: none;
}

button {
    width: 100%;
    padding: 12px;
    background: #28a745;
    border: none;
    color: #fff;
    font-size: 1rem;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background: #218838;
}

a {
    display: block;
    margin-top: 15px;
    color: #007bff;
    text-decoration: none;
    font-size: 0.9rem;
}

a:hover {
    text-decoration: underline;
}

.error {
    color: red;
    margin-bottom: 10px;
    font-size: 0.9rem;
}

.success {
    color: green;
    margin-bottom: 10px;
    font-size: 0.9rem;
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
    <div class="container">
        <h2>Registro</h2>
        <?php if (!empty($erro)) echo "<p class='error'>$erro</p>"; ?>
        <?php if (!empty($sucesso)) echo "<p class='success'>$sucesso</p>"; ?>
        
        <form action="" method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required>
            <button type="submit">Registrar</button>
            <a href="../views/view_home_login.php">Voltar</a>
        </form>
    </div>
</body>
</html>
