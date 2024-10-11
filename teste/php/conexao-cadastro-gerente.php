<?php include("bd.php"); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = new mysqli($host, $usuario, $senha, $bd);

    if ($conexao->connect_errno) {
        echo "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
        exit();
    } else {
        // Evita caracteres especiais (SQL Inject)
        $usuario = $conexao->real_escape_string($_POST['usuario']);
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);
        $confirmSenha = $conexao->real_escape_string($_POST['confirmSenha']);

        if ($senha !== $confirmSenha) {
            echo '<div style="color: red; font-weight: bold; font-size: 16px; margin: 20px;">As senhas não coincidem. Tente novamente.</div>';
        } else {
            // Verifica se o usuário ou email já está cadastrado
            $sql = "SELECT * FROM `sitebanco`.`cadastrogerente` WHERE `nome` = ? OR `email` = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param('ss', $usuario, $email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                echo '<div style="color: red; font-weight: bold; font-size: 16px; margin: 20px;">Usuário ou email já cadastrado.</div>';
            } else {
                // Insere o novo usuário
                $sql = "INSERT INTO `sitebanco`.`cadastrogerente` (`nome`, `email`, `senha`) VALUES (?, ?, ?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bind_param('sss', $usuario, $email, $senha);
                $stmt->execute();

                $conexao->close();
                header('Location: home.php', true, 301);
                exit();
            }
        }

        $conexao->close();
    }
}
?>
