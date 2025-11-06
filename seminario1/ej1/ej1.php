<?php
//Ej1
/*function obtenerNumMax($array){
    if(empty($array)){
        return null;
    }

    $maximo = $array[0];
    foreach ($array as $numero){
        if($numero > $maximo){
            $maximo = $numero;
        }
    }
    return $maximo;
}

$numeros = [13,45,76,1];
echo "El numero maximo es: ".obtenerNumMax($numeros);*/

//Ej2
/*function sumaArray($numeros){
    $suma = 0;
    foreach ($numeros as $numero) {
        $suma += $numero;
    }
    return $suma;
}
$sum = [1,2,3,4];
echo "La suma es: " . sumaArray($sum);*/

//Ej3
/*function milla($dist){
    $millas = 1;
    $dist = 1.60934;
    $milla = $millas * $dist;

    return $milla;
}

$milla = 1;
echo "El resultado es: " . milla($milla);*/

//Ej4
/*
function Palindromo($cadena) {
    $cadena = strtolower(str_replace(' ', '', $cadena));
    return $cadena === strrev($cadena);
}
$MostrarPorConsola = readline("Introduce una palabra por consola:  ");

if(Palindromo($MostrarPorConsola) == "consola") {
    echo "Es palindromo";
} else{
    echo "No es palindromo";
}*/

//Ej5
/*function contarOcurrencias($texto, $letra) {
$texto = strtolower($texto);
$letra = strtolower($letra);

$contador = substr_count($texto, $letra);
return $contador;
}

$texto = "Hola me gustan las patatas";
$letra = "a";

echo "La letra se repite un total de: ". contarOcurrencias($texto, $letra);*/

//Ej6
/*function contarSubcadena($texto, $subcadena) {
$texto = strtolower($texto);
$subcadena = strtolower($subcadena);

$contador = substr_count($texto, $subcadena);
return $contador;
}

$texto = "Hola me gustan las patatas";
$subcadena = "me";

echo "La subcadena se repite un total de: ". contarSubcadena($texto, $subcadena);*/

//Ej7
/*function mayusculas ($texto){
return ucwords($texto);
}
$texto = "hola mundo";
echo mayusculas($texto);*/

//Ej8
/*function sumaDigitos($num){
    return array_sum(str_split($num));
}
echo sumaDigitos(245);*/

//Ej9
/*function maximoComunDivisor($num1,$num2){
$num1 = abs($num1);
$num2 = abs($num2);

while($num2 != 0){
    $rest = $num1 % $num2;
    $num1 = $num2;
    $num2 = $rest;
}
return $num1;
}

$num1 = 12;
$num2 = 28;

echo "El maximo comun divisor de los numeros es: ".maximoComunDivisor($num1,$num2);*/

//Ej10
/*function fibonacci($n) {
    if ($n == 0) return 0;
    if ($n == 1) return 1;
    return fibonacci($n - 1) + fibonacci($n - 2);
}
echo fibonacci(10);*/

//Ej11
/*function primRelativo($a, $b){
    while($b != 0){
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a == 1;
}
$num1 = 17;
$num2 = 19;

if(primRelativo($num1, $num2)){
    echo "Si son primos relativos";
}else{
    echo "No son primos relativos";
}*/

//Ej12
/*function capicua($numero){
    $texto = strval($numero);
    $revertir = strrev($texto);
    return $texto === $revertir;
}
$num = 1221;
if (capicua($num)) {
    echo "$num es capicua";
} else {
    echo "$num no es capicua";
}*/

//Ej13
/*function tablaHtml($table) {
    list($etiqueta, $clase) = explode('.', $table);
    return "<$etiqueta class=\"$clase\"></$etiqueta>";
}

echo tablaHtml("div.oferta");*/

//Ej14
/*function mosaicoNumerico($num) {
    for ($i = 1; $i <= $num; $i++) {
        echo str_repeat($i, $i) . "\n";
    }
}
mosaicoNumerico(6);*/

//Ej15


