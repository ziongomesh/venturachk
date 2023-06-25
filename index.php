<?php
/*
 * Separar emails por provedores
 * by Kobra
 * css TioBlack
 */

error_reporting(0);

$conteudo = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    if (isset($lista)) {
        $lista = explode(PHP_EOL, $lista);
        foreach ($lista as $y) {
            list($email, $senha) = explode("|", $y);
            $provedor = strtolower(explode("@", $email)[1]);
            if (!isset($conteudo[$provedor])) {
                $conteudo[$provedor] = array();
            }
            array_push($conteudo[$provedor], "$email|$senha");
        }
    }
}
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
                <link href="assets\css\style.css" rel="stylesheet" type="text/css">
        <title>Central VTC - Separador</title>
        <meta name="author" value="Kobra">
    </head>
    <body>
    <center>
                    <h1 style="color: white;font-family: 'Chakra Petch', sans-serif;">Separador por Provedores.</h1>
                    <h2 >Ex: @terra.com.br / @gmail.com / @hotmail.com / Qualquer um.</h2>
        <div class="formBack">
        <form method="POST">
            <textarea name="lista" class="mail_list" placeholder="INSIRA SUA DB AQUI"></textarea>
            <br><br>
            <button class="btn_go" type="submit" style="vertical-align:middle"><span>SEPARAR</span></button>
        </form>
        </div>
        <div>
            <?php
            echo'<br><br>';
            foreach ($conteudo as $val) {
                if (count($val) > 1) {
                    echo '<textarea class="mail_list" style="margin: 0px; height: 91px; width: 302px;">';
                    sort($val);
                    foreach ($val as $k) {
                        echo $k . PHP_EOL;
                    }
                    echo "</textarea>&nbsp;";
                }
            }
            ?>
        </div>
    </center>
</body>
</html>