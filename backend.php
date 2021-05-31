<?php

$tipo = $_POST["tipo"];
$a1 = intval($_POST["a1"]);
$razao = $_POST["razao"];
$qtd = $_POST["qtdelemento"];

geraArquivoProg($tipo, $a1, $razao, $qtd);


function geraArquivoProg($tipo, $a1, $razao, $qtd)
{
    switch ($tipo) {
        case 1:
            $prog = geraProgA($a1, $razao, $qtd);
            break;
        case 2:
            $prog = geraProgG($a1, $razao, $qtd);
            break;
    }
    file_put_contents('prog.json', $prog);
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="prog.json"');
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize("prog.json"));
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Expires: 0');
    readfile('prog.json');
}

function geraProgA($a1, $razao, $qtd)
{
    $prog = [$a1];
    for ($i = 1; $i < $qtd; $i++) {
        $prog[] = $a1 + ($razao * $i);
    }
    return json_encode($prog);
}

function geraProgG($a1, $razao, $qtd)
{
    $prog = [$a1];
    for ($i = 1; $i < $qtd; $i++) {
        $prog[] = $prog[$i - 1] * $razao;
    }
    return json_encode($prog);
}

header("php.php");
