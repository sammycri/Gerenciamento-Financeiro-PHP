<?php
    $q = "select saldo, investido from usuarios where usuario='" . $_SESSION['user'] . "'";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
?>
<style>
    h5
    {
        background-color: red;
        color: white;
    }
    </style>
<h1> Gerencie suas finanças</h1>
<form action="user-financeiro.php" method="post">
<table>
    <tr><td> <?php  echo "Olá, <strong>" . $_SESSION['nome'] . "</strong>";
                    echo "</br>"; echo "</br>";
                    echo "<h5>Leia com atenção todos os campos antes de confirmar depósito ou retirada.</h5>";
             ?>

    <table><fieldset id="dinheiro">
                <legend> Origem dos valores </legend>
                <input type="radio" name="tDinheiro" id="cDinheiro" value="liquido" checked>
                <label for="cDinheiro"> Dinheiro e ou saldo em conta-corrente </label>
                <br/>
                <input type="radio" name="tDinheiro" id="cInvestimento" value="preso">
                <label for="cInvestimento"> Investidos e ou saldo em Poupança </label>
            </fieldset>
    <br/>
    <br/>
    <br/>
</table>
        <table>
            <tr> (Obs: para registrar retirada de valores, basta usar o sinal de menos "-" antes dos valores.)
            <tr>  <br>
            <tr><td>Insira os valores:
            <td><input type="number" name="valor" id="valor" step="any">
        </table>
<br/>
<table>
    <tr><td><input type="checkbox" name="iValores" id="iValores" size="10" maxlength="10" checked>
            <label for="iValores"> Confirmo os valores passados. </label>
</table>
<br/>
<table>
    <tr><td><fieldset> <?php echo "<p>Saldo líquido " . "R$ " . "<strong>".  $reg->saldo. "</strong> </p>"?></fieldset>
        <td> <fieldset><?php echo "<p>Retido em investimentos " . "R$ " . "<strong>".  $reg->investido. "</strong> </p>"?></fieldset>
    <tr><td><input type="submit" value="Retirar valores"><td><input type="submit" value="Confirmar Depósito">
</table>
</form>