<?php
$host = 'db';
$dbname = 'testdb';
$username = 'alumno';
$password = 'alumno';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$version = $pdo->query('SELECT VERSION()')->fetchColumn();
require_once 'bd.php';

$usuario_id = 1;
$producto_id = 1;
$cantidad = 2;

try{
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("SELECT id FROM  usuarios WHERE id = ?");
    $stmt->execute([$usuario_id]);
    if(!$stmt->fetch()){
        throw new Exception("El usuario no existe en la base de datos");
    }


    $stmt = $pdo->prepare("SELECT precio, stock FROM productos WHERE id = ?");
    $stmt->execute([$producto_id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$producto){
        throw new Exception("El producto no existe en la base de datos");
    }

    if($producto['stock'] < $cantidad){
        throw new Exception("El producto no tiene suficiente stock");
    }

    $total = $producto['precio'] * $cantidad;

    $stmt = $pdo->prepare("INSERT INTO pedidos (usuario_id, fecha, total) VALUES (?, NOW(), ?)");
    $stmt->execute([$usuario_id, $total]);

    $stmt = $pdo->prepare("UPDATE productos SET stock = ? WHERE id = ?");
    $stmt->execute([$cantidad, $producto_id]);

    $pdo->commit();
    echo "La compra se ha realizado correctamente: $total";
}catch (PDOException $e){
    if($pdo->inTransaction()){
        $pdo->rollBack();
    }
    echo "Error: ".$e->getMessage();
}