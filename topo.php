<?php
    echo "<p class='pequeno'>";
    if(empty($_SESSION['user']))
    {
        echo  "<a href= 'user-login.php'>Entrar</a>";
    }
    else
    {
        echo "Olá, <strong>" . $_SESSION['nome'] . "</strong> | ";
        echo "<a href='user-edit.php'> Meus dados</a> | ";
        echo "<a href='user-financeiro.php'> Finanças</a> | ";
        echo "<a href= 'logout.php'> Sair </a>";
    }

    echo "</p>";