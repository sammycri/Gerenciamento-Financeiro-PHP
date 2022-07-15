<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento Financeiro</title>
    <link rel="stylesheet" href="css/estilo.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        div#corpo
        {
            width: 600px;
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
    if(!is_logado())
    {
        echo msg_erro("efetue <a href='user-login.php'> login</a> para fazer o controle financeiro.");
    }
    else
    {
        $q = "select saldo, investido from usuarios where usuario='" . $_SESSION['user'] . "'";
        $busca = $banco->query($q);
        $reg = $busca->fetch_object();
        $velhoValorSaldo = $reg->saldo;
        $velhoValorInvest = $reg->investido;
        $valor = $_POST['valor'] ?? null;
        $tipo = $_POST['tDinheiro'] ?? null;
        if(is_null($valor))
        {
            require 'user-financeiro-form.php';
        }
        else
        {
            if(!empty($valor))
            {
                if($tipo == 'liquido')
                {
                    $valor += $velhoValorSaldo;
                    $q = "UPDATE usuarios set saldo='$valor'";
                    $q .= " where usuario = '" . $_SESSION['user'] . "'";
                }
                else
                {
                    $valor += $velhoValorInvest;
                    $q = "UPDATE usuarios set investido='$valor'";
                    $q .= " where usuario = '" . $_SESSION['user'] . "'";
                }
                if($banco->query($q))
                {
                    echo msg_sucesso("Valores atualizados com sucesso.");
                    ?>
                            <script>//redirecionamento autatico para pagina inicial
                                setTimeout(function() {
                                    window.location.href = "user-financeiro.php";
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
                                    window.location.href = "user-financeiro.php";
                                }, 2000);
                            </script>
                    <?php
                }
            }
            else
            {
                echo msg_erro("Favor preencher o campo de valor antes de tentar salvar.");
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                ?>
                            <script>//redirecionamento autatico para pagina inicial
                                setTimeout(function() {
                                    window.location.href = "user-financeiro.php";
                                }, 2000);
                            </script>
                    <?php
            }
            
        }
    }

    ?>
    </table>
    <?php echo voltar();    ?>
</div>
<?php include_once "rodape.php"; ?>
</body>
</html>