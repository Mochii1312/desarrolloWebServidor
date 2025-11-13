<?php
//Ej4 Procesador de texto
function analizarTexto($texto) {
    $texto = strtolower($texto);
    $texto = preg_replace('/[^\w\s]/', '', $texto);

    $palabras = preg_split('/\s+/', trim($texto));

    $totalPalabras = count($palabras);

    $frecuencia = array_count_values($palabras);

    $longitud = 0;
    foreach ($palabras as $palabra) {
        $longitud += strlen($palabra);
    }
    $longitudMedia = $totalPalabras > 0 ? $longitud / $totalPalabras : 0;

    return [
        'total_palabras' => $totalPalabras,
        'frecuencia' => $frecuencia,
        'longitud_media' => round($longitudMedia, 2)
    ];
}

$texto = "Me gustan las patatas";
$resultado = analizarTexto($texto);

echo "Total de palabras: " . $resultado['total_palabras'] . "\n";
echo "Longitud promedio: " . $resultado['longitud_media'] . "\n";
echo "Frecuencia de palabras:\n";
foreach ($resultado['frecuencia'] as $palabra => $cantidad) {
    echo "- $palabra: $cantidad\n";
}
?>