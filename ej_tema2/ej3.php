<?php
//Ej3 Manipulacion de arrays
$productos = [
    ["nombre" => "Laptop", "precio" => 1200],
    ["nombre" => "Teclado", "precio" => 40],
    ["nombre" => "Monitor", "precio" => 300],
    ["nombre" => "Mouse", "precio" => 25]
];


function filtrarProduCaros($lista) {
    return array_filter($lista, function($p) {
        return $p["precio"] > 100;
    });
}

function ordenarPrecio($lista) {
    usort($lista, function($a, $b) {
        return $a["precio"] <=> $b["precio"];
    });
    return $lista;
}

function aplicarDescue($lista) {
    return array_map(function($p) {
        $p["precio"] = $p["precio"] * 0.9;
        return $p;
    }, $lista);
}

echo "Productos: ";
print_r($productos);

echo "caros: ";
print_r(filtrarProduCaros($productos));

echo "Ordenar; ";
print_r(ordenarPrecio($productos));

echo "Descuento: ";
print_r(aplicarDescue($productos));

