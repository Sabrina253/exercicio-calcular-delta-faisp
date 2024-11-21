<?php
header('Content-Type: application/json'); //informando para o php que iremos trabalhar com o json

if($_SERVER['REQUEST_METHOD'] == 'POST'){ //informando para o servidor que será o método POST
    $dados = json_decode(file_get_contents("php://input")); //a função json_decode irá servi para ler os dados das variáveis

    $a = $dados->a;
    $b = $dados->b;
    $c = $dados->c;

    $delta = ($b * $b) - (4 * $a * $c);

    echo json_encode(['delta' => $delta]); //a função json_encode irá devolver a requisição para o json

} else {
    echo json_encode(['erro' => 'Método não suportado. Use o método POST']); 
}
?>