<?php
$host = 'db';
$dbname = 'testdb';
$username = 'alumno';
$password = 'alumno';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$version = $pdo->query('SELECT VERSION()')->fetchColumn();
require_once 'bd.php';

try {
    $pdo->exec("ALTER TABLE productos ADD COLUMN eliminado TINYINT(1) DEFAULT 0");
} catch (Exception $e) {

}
$stmt = $pdo->prepare("UPDATE productos SET eliminado = 1 WHERE stock = 0");
$stmt->execute();

$stmt = $pdo->prepare("SELECT id, nombre, precio, stock FROM productos WHERE eliminado = 0");
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($productos);