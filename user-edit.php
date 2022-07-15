<!DOCTYPE html>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilo.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <title>Edição de dados</title>
    </head>
    <body>
        <div id="corpo">
            <?php
                if(!is_logado())
                {
                    echo msg_erro("efetue <a href='user-login.php'> login</a> para editar os dados de um usuário.");
                }
                else
                {
                    if(!isset($_POST['usuario']))
                    {
                        include "user-edit-form.php";
                    }
                    else
                    {
                        $usuario = $_POST['usuario'] ?? null;
                        $nome = $_POST['nome'] ?? null;
                        $senha1 = $_POST['senha1'] ?? null;
                        $senha2 = $_POST['senha2'] ?? null;

                        $q = "update usuarios set usuario='$usuario', nome='$nome'";
                        if(empty($senha1) || is_null($senha1))
                        {
                            echo msg_aviso("Senha antiga foi mantida.");
                            ?>
                            <script>//redirecionamento autatico para pagina inicial
                                setTimeout(function() {
                                    window.location.href = "index.php";
                                }, 2000);
                            </script>
                            <?php
                        }
                        else
                        {
                            if($senha1 === $senha2)
                            {
                                $senha = gerarHash($senha1);
                                $q .= ", senha='$senha'";
                            }
                            else
                            {
                                echo msg_erro("Senhas nao conferem, tente novamente!");
                                ?>
                                <script>//redirecionamento autatico para pagina inicial
                                    setTimeout(function() {
                                        window.location.href = "user-edit.php";
                                    }, 2000);
                                </script>
                                <?php
                            }
                        }
                        $q .= " where usuario = '" . $_SESSION['user'] . "'";

                        if($banco->query($q) && !empty($senha1))
                        {
                            echo msg_sucesso("Dados alterados com sucesso.");                            
                            ?>
                            <script>//redirecionamento autatico para pagina inicial
                                setTimeout(function() {
                                    window.location.href = "index.php";
                                }, 2000);
                            </script>
                            <?php

                        }
                        else
                        {
                            echo msg_erro("Não foi possível alterar os dados.");
                            ?>
                            <script>//redirecionamento autatico para pagina inicial
                                setTimeout(function() {
                                    window.location.href = "index.php";
                                }, 2000);
                            </script>
                            <?php
                        }

                    }
                }
            ?>
            <?php echo voltar(); ?>
        </div>
        <?php include_once "rodape.php"; ?>
    </body>
</html>