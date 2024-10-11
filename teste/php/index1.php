<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <?php
      // retomando a sessão criada:
      session_start();
      // ecoando os dados gravados na sessão:
      echo "Os dados recebidos foram:<br><br>";
      echo "Nome: " . $_SESSION['nome'] . "<br>";
      echo "Sobrenome: " . $_SESSION['sobrenome'];
    ?>
</body>
</html>