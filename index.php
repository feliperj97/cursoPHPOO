<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Conta</title>
</head>
<body>
    <?php
        include_once "Conta.php";
        $p1 = new Conta();
        $p2 = new Conta();

        $p1->abrirConta("CC");
        $p1->setDono("Jubileu");
        $p1->setNumconta(1111);
        $p1->depositar(300);//depositou 300 reais
        $p1->getSaldo();
        $p1->pagarMensal();

        $p2->abrirConta("CP");
        $p2->setDono("Creuza");
        $p2->setNumconta(2222);
        $p2->depositar(500);//depositou 500
        $p2->sacar(100);//sacou 100
        $p2->getSaldo();
        $p2->pagarMensal();

        echo "<pre>";
        print_r($p1);

        print_r($p2);
        echo "</pre>";

    
    ?>
</body>
</html>