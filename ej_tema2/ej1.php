<?php
//Ej1 Calculadora
function suma($num1, $num2){
    return $num1 + $num2;
}
function resta($num1, $num2){
    return $num1 - $num2;
}
function multiplicar($num1, $num2){
    return $num1 * $num2;
}
function dividir($num1, $num2){
    return $num1 / $num2;
}

function calculadora($num1, $num2, $operacion){
    return match ($operacion) {
        "+" => $num1 + $num2,
        "-" => $num1 - $num2,
        "*" => $num1 * $num2,
        "/" => $num1 / $num2,
        default => "Error",
    };
}
$num1 = readline("Introduce el primer numero: ");
$operacion = readline("Que operacion vas a realizar? ");
$num2 = readline("Introduce el segundo numero: ");
$resultado = calculadora($num1, $num2, $operacion);

echo ("Resultado:  $resultado");