<style>
    td#esquerda
    {
        text-align: right;
    }
    </style>

<h1> Novo usuário </h1>
<form action="user-new.php" method="post">
    <table style="font-size: 15pt">
        <tr><td id="esquerda"> Usuário: <td><input type="text" name="usuario" id="usuario" width="100%" maxlength="10">
        <tr><td id="esquerda"> Nome: <td><input type="text" name="nome" id="nome" width="100%" maxlength="10">
        <tr><td id="esquerda"> Senha: <td><input type="password" name="senha1" id="senha1" width="100%" maxlength="10">
        <tr><td id="esquerda">Confirme a senha: <td><input type="password" name="senha2" id="senha2" width="100%" maxlength="10">
        <tr><td id="esquerda"><input type="submit" value="Salvar">

    </table>
</form>
