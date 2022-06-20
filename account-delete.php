<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página de login</title>
    <link rel="stylesheet" href="css/estilo.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        div#corpo
        {
            width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 30px #777;
        }

        p#conteudo
        {
            text-align:justify;
        }
        button
        {
            margin-left: 200px;
            width: 100px;
            height: 60px;
        }
        input#usuario
        {
            margin-left: 200px;
            width: 100px;
            height: 40px;
            text-align: center;
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
    if(!isset($_POST['usuario']))
    {
        require 'account-delete-form.php';
    }
    else
    {
        $usuario = $_POST['usuario']  ?? null;        
        $q = "DELETE FROM usuarios WHERE `usuarios`.`usuario` = '$usuario'";
        if($banco->query($q))
        {
            echo msg_sucesso("Usuário deletado com sucesso!");
            $_SESSION['user'] = "";
            $_SESSION['nome'] = "";
        }
        else
        {
            echo msg_erro("Não foi possível deletar a conta, tente novamente.");
        } 
    }              
    ?>    

    <?php echo voltar(); ?>
</div>
<?php include_once "rodape.php"; ?>
</body>
</html>