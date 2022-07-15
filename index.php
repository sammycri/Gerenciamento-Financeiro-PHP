<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle financeiro</title>
    <link rel="stylesheet" href="css/estilo.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
<body>
    <?php
        require_once 'includes/banco.php';
        require_once 'includes/login.php';
        require_once 'includes/funcoes.php';
    ?>
    <div id="corpo">
        <header><?php include_once "topo.php"; ?></header>
        <h1> Bem vindo</h1>
        <p><br/> Esse é um projeto feito com HTML5, CSS3, PHP e MYSQL.</p>
        <p> Trata-se de um sistema de gerenciamento financeiro pessoal com funcionalidades básicas. O sistema possuí criação de conta, para que haja distinção entre os usuários e seus dados</p>
        <p> Para começar basta efetuar o <a href="user-login.php"> login </a>, e seguir preenchendo os dados conforme lhe for pedido, logo após o login, basta clickar em "Finanças" o topo da página.</p>
        <p> Updated 1.2</p>
        </table>
    </div>
    <?php include_once "rodape.php"; ?>
</body>
</html>