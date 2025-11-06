<?php
//Ej1
function obtenerNumMax($array){
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
echo "El numero maximo es: ".obtenerNumMax($numeros)."\n";

//Ej2
function sumaArray($numeros){
    $suma = 0;
    foreach ($numeros as $numero) {
        $suma += $numero;
    }
    return $suma;
}
$sum = [1,2,3,4];
echo "La suma es: " . sumaArray($sum)."\n";

//Ej3
function milla($dist){
    $millas = 1;
    $dist = 1.60934;
    $milla = $millas * $dist;

    return $milla;
}

$milla = 1;
echo "El resultado es: " . milla($milla)."\n";

//Ej4

function Palindromo($cadena) {
    $cadena = strtolower(str_replace(' ', '', $cadena));
    return $cadena === strrev($cadena);
}
$MostrarPorConsola = readline("Introduce una palabra por consola:  ");

if(Palindromo($MostrarPorConsola) == "consola") {
    echo "Es palindromo \n";
} else{
    echo "No es palindromo \n";
}

//Ej5
function contarOcurrencias($texto, $letra) {
$texto = strtolower($texto);
$letra = strtolower($letra);

$contador = substr_count($texto, $letra);
return $contador;
}

$texto = "Hola me gustan las patatas";
$letra = "a";

echo "La letra se repite un total de: ". contarOcurrencias($texto, $letra)."\n";

//Ej6
function contarSubcadena($texto, $subcadena) {
$texto = strtolower($texto);
$subcadena = strtolower($subcadena);

$contador = substr_count($texto, $subcadena);
return $contador;
}

$texto = "Hola me gustan las patatas";
$subcadena = "me";

echo "La subcadena se repite un total de: ". contarSubcadena($texto, $subcadena)."\n";

//Ej7
function mayusculas ($texto){
return ucwords($texto);
}
$texto = "hola mundo";
echo mayusculas($texto);

//Ej8
function sumaDigitos($num){
    return array_sum(str_split($num));
}
echo sumaDigitos(245)."\n";

//Ej9
function maximoComunDivisor($num1,$num2){
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

echo "El maximo comun divisor de los numeros es: ".maximoComunDivisor($num1,$num2)."\n";

//Ej10
function fibonacci($n) {
    if ($n == 0) return 0;
    if ($n == 1) return 1;
    return fibonacci($n - 1) + fibonacci($n - 2);
}
echo fibonacci(10)."\n";

//Ej11
function primRelativo($a, $b){
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
    echo "Si son primos relativos \n";
}else{
    echo "No son primos relativos \n";
}

//Ej12
function capicua($numero){
    $texto = strval($numero);
    $revertir = strrev($texto);
    return $texto === $revertir;
}
$num = 1221;
if (capicua($num)) {
    echo "$num es capicua \n";
} else {
    echo "$num no es capicua \n";
}

//Ej13
function tablaHtml($table) {
    list($etiqueta, $clase) = explode('.', $table);
    return "<$etiqueta class=\"$clase\"></$etiqueta>";
}

echo tablaHtml("div.oferta")."\n";

//Ej14
function mosaicoNumerico($num) {
    for ($i = 1; $i <= $num; $i++) {
        echo str_repeat($i, $i) . "\n";
    }
}
mosaicoNumerico(6);

//Ej15
function compararArray($array1, $array2) {
    $resultado = [];
    for ($i = 0; $i < count($array1); $i++) {
        $resultado[] = ($array1[$i] == $array2[$i]);
    }
    return $resultado;
}

print_r(compararArray([1, 2, 3], [1, 2, 4]))."\n";

//Ej16
function producto($numeros) {
    $resultado = 1;
    foreach ($numeros as $n) {
        $resultado *= $n;
    }
    return $resultado;
}

echo "El producto de los tres numeros es: " . producto([2, 3, 4])."\n";

//Ej17

function filtrar($numeros) {
    $pares = [];
    foreach ($numeros as $n) {
        if ($n % 2 == 0) {
            $pares[] = $n;
        }
    }
    return $pares;
}

print_r(filtrar([1, 2, 3, 4, 5, 6]))."\n";

//Ej18

function comprobarPrimo($n) {
    if ($n <= 1) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

echo comprobarPrimo(7) ? 'Es primo' : 'No es primo'."\n";

//Ej19

function eliminarVocals($palabra) {
    return str_replace(['a','e','i','o','u','A','E','I','O','U'], '', $palabra);
}

echo eliminarVocals("Me gustan las patatas")."\n";

//Ej20
function factorialNum($num) {
    $resultado = 1;
    for ($i = 1; $i <= $num; $i++) {
        $resultado *= $i;
    }
    return $resultado;
}

echo "El factorial de los numeros es de: " . factorialNum(5)."\n";

//Ej21

function invertirCade($palabra) {
    return strrev($palabra);
}

echo invertirCade("Hola mundo")."\n";

//Ej22

function numPerfecto($numero) {
    $suma = 0;
    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i == 0) $suma += $i;
    }
    return $suma == $numero;
}

echo numPerfecto(6) ? 'Si' : 'No'."\n";

//Ej23
function numArmstrong($n) {
    $numeros = str_split($n);
    $cantidadNume = count($numeros);
    $suma = 0;
    foreach ($numeros as $d) {
        $suma += pow($d, $cantidadNume);
    }
    return $suma == $n;
}

echo numArmstrong(153) ? 'true' : 'false'."\n";

//Ej24

define('Descuento_jovenes', 0.15);
define('Descuento_jubilado', 0.20);
define('Descuento_VIP', 0.25);

function calcularPrecio($precio, $tipoCliente) {
    switch ($tipoCliente) {
        case 'estudiante':
            $descuento = Descuento_jovenes;
            break;
        case 'jubilado':
            $descuento = Descuento_jubilado;
            break;
        case 'vip':
            $descuento = Descuento_VIP;
            break;
        default:
            $descuento = 0;
    }
    return $precio * (1 - $descuento);
}

echo "El precio final con el descuento es de: ". calcularPrecio(100, "vip")."\n";

//Ej25

function notasFinales($nota) {
    return match (true) {
        $nota >= 9 && $nota <= 10 => "Sobresaliente",
        $nota >= 7 && $nota <= 8 => "Notable",
        $nota >= 5 && $nota <= 6 => "Aprobado",
        $nota >= 0 && $nota <= 4 => "Suspenso",
        default => "Nota inválida"
    };
}

echo "El resultado obetnido es de: ".notasFinales(8)."\n";

//Ej26

function validar($datos) {
    return [
        'nombre' => $datos['nombre'] ?? 'Anónimo',
        'email' => $datos['email'] ?? 'sin-email@example.com',
        'edad' => $datos['edad'] ?? 18,
        'ciudad' => $datos['ciudad'] ?? 'Desconocida'
    ];
}

print_r(validar(['nombre' => 'Juan', 'edad' => 25]));

//Ej27

function obtenerDatos($usuario) {
    return $usuario?->direccion?-> codigoPostal ?? 'Código postal no disponible';
}

$usuario = (object) [
    'nombre' => 'Ana',
    'direccion' => (object)[
        'calle' => 'Gran Vía',
        'ciudad' => 'Madrid',
        'codigoPostal' => '19634'
    ]
];

echo obtenerDatos($usuario)."\n";

//Ej28

$num1 = readline("Primer número: ");
$num2 = readline("Segundo número: ");
$operacion = readline("Operación (+, -, *, /): ");

if ($operacion == '+') {
    $res = $num1 + $num2;
} else if ($operacion == '-') {
    $res = $num1 - $num2;
} else if ($operacion == '*') {
    $res = $num1 * $num2;
} else if ($operacion == '/') {
    if ($num2 == 0) {
        echo "Error, no se puede dividir entre 0 \n";
        exit;
    }
    $res = $num1 / $num2;
} else {
    echo "Error \n";
    exit;
}

echo "Resultado: $num1 $operacion $num2 = $res \n";

//Ej29

function convertirTempe($valor, $de, $a) {

    echo "Ejecutando " . __FUNCTION__ . " en línea " . __LINE__ . "\n";

    switch ("$de-$a") {
        case 'celsius-fahrenheit':
            return ($valor * 9/5) + 32;
        case 'celsius-kelvin':
            return $valor + 273.15;
        case 'fahrenheit-celsius':
            return ($valor - 32) * 5/9;
        case 'kelvin-celsius':
            return $valor - 273.15;
        default:
            return "Conversión no válida";
    }
}

echo convertirTempe(25, 'celsius', 'fahrenheit');
















