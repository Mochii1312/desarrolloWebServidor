<?php
$host = 'db';
$dbname = 'testdb';
$username = 'alumno';
$password = 'alumno';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$version = $pdo->query('SELECT VERSION()')->fetchColumn();
require_once 'bd.php';


$categoria_id = 1;
$producto_id = 3;
$cantidad = 2;
$pdo->beginTransaction();

$stmt = $pdo->prepare("UPDATE productos SET precio = precio * 1.10 WHERE categoria_id = ?");
$stmt->execute([$categoria_id]);

$stmt = $pdo->prepare("SELECT STOCK FROM productos WHERE ID = ? FOR UPDATE");
$stmt->execute([$producto_id]);
$stock = $stmt->fetchColumn();

if($stock === false){
    echo "El producto no existe en la base de datos";
}
if($stock < $cantidad){
    echo "Stock insuficiente";
}

$stmt = $pdo->prepare("UPDATE productos SET stock = stock -? WHERE id = ?");
$stmt->execute([$cantidad, $producto_id]);


$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($productos);
$pdo->commit();