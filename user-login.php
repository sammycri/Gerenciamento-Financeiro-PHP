<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página de login</title>
    <link rel="stylesheet" href="estilo.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        div#corpo
        {
            width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 30px #777;
        }

    </style>

</head>
<body>
<?php
require_once 'includes/banco.php';
require_once 'includes/login.php';
require_once 'includes/funcoes.php';
?>
<div id="corpo">
    <?php
        $u = $_POST['usuario'] ?? null;
        $s = $_POST['senha'] ?? null;
        if(is_null($u) || is_null($s))
        {
            require 'user-login-form.php';
        }
        else
        {
            $q = "SELECT usuario, nome, senha FROM usuarios where usuario = '$u' LIMIT 1";
            $busca = $banco->query($q);
            if(!$busca)
            {
                echo msg_erro("Falha ao acessar o banco de dados!");
            }
            else
            {
                if($busca->num_rows > 0)
                {
                    $reg = $busca->fetch_object();
                    if(testarHash($s, $reg->senha))
                    {
                        echo msg_sucesso("Logado com sucesso");
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                    }
                    else
                    {
                        echo msg_erro("Senha inválida");
                    }
                }
                else
                {
                    echo msg_aviso("Usuário não encontrado");
                }
            }
        }


    ?>
    <?php echo voltar(); ?>
</div>
<?php include_once "rodape.php"; ?>
</body>
</html>