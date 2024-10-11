<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da Gerência</title>
    <style>
        .box {
            margin-left: auto;
            margin-right: auto;
            border: 4px solid black;
            width: 30%;
            border-radius: 1em;
            padding-bottom: 12px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
        .success {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <center>
        <div class="box">
            <h1>Cadastre-se</h1>
            <form id="cadastroForm" action="conexao-cadastro-gerente.php" method="POST">
                <p>
                    <label for="usuario">Usuário: </label>
                    <input type="text" name="usuario" size="20" placeholder="Usuário" required>
                </p>
                <p>
                    <label for="email">Email: </label>
                    <input type="email" name="email" size="20" placeholder="Email" required>
                </p>
                <p>
                    <label for="senha">Senha: </label>
                    <input type="password" id="senha" name="senha" size="20" placeholder="Senha" required>
                </p>
                <p>
                    <label for="confirmSenha">Confirme: </label>
                    <input type="password" id="confirmSenha" name="confirmSenha" size="20" placeholder="Confirme sua senha" required min=1 max=8>
                </p>
                <p>
                    <button type="submit">Cadastrar</button>
                </p>
            </form>
            <div id="error-message" class="error" style="display: none;"></div>
            <div id="success-message" class="success" style="display: none;"></div>
            Você já está cadastrado? <a href="index.php">Logar</a>
        </div>
    </center>
</body>
</html>
