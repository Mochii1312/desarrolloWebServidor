<?php
$host = 'db';
$dbname = 'testdb';
$username = 'alumno';
$password = 'alumno';
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$version = $pdo->query('SELECT VERSION()')->fetchColumn();

$pdo->exec("CREATE TABLE if NOT EXISTS categorias(id INT  PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, descripcion TEXT, UNIQUE(NOMBRE))");
$stmt = $pdo->query("SELECT * FROM categorias");

$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($categorias);


$pdo->exec("CREATE TABLE if NOT EXISTS productos(id INT  PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, categoria_id INT NOT NULL, precio DECIMAL(10, 2) NOT NULL, stock INT DEFAULT 0,FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)");
$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($productos);

$pdo->exec("CREATE TABLE if NOT EXISTS usuarios(id INT  PRIMARY KEY AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL,contraseña VARCHAR(50) NOT NULL)");
$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios= $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($usuarios);

$pdo->exec("CREATE TABLE if NOT EXISTS pedidos(id INT  PRIMARY KEY AUTO_INCREMENT, usuario_id INT NOT NULL, fecha DATE NOT NULL, total INT DEFAULT 0, FOREIGN KEY (usuario_id) REFERENCES usuarios(id))");
$stmt = $pdo->query("SELECT * FROM pedidos");
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($pedidos);

//Ej2
$count = $pdo->query("SELECT COUNT(*) FROM categorias")->fetchColumn();
if($count == 0){
    $pdo->exec("INSERT INTO categorias (nombre) VALUES
                         ('Citricos'),
                         ('Frutos rojos'),
                         ('Tropicales')
        ");
}
$count = $pdo->query("SELECT COUNT(*) FROM productos")->fetchColumn();
if($count == 0){
    $pdo->exec("INSERT INTO productos (nombre,categoria_id,precio,stock) VALUES
                         ('Manzana',1,0.87,54),
                         ('Pera',1,0.21,23),
                         ('Mango',1,0.98,78),
                         ('Platano',2,0.43,90),
                         ('Melocoton',2,0.56,0),
                         ('Kiwi',3,0.70,65),
                         ('Naranja',3,0.12,14),
                         ('Mandarina',4,0.49,40),
                         ('Cereza',4,1.45,88),
                         ('Fresa',5,1.78,100)
                                          ");
}

//Ej3
$stmt = $pdo->prepare( "SELECT * FROM productos ORDER BY precio ASC");
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($productos as $producto) {
    echo "<p>$producto[nombre]</p>";
}
$stmt = $pdo->prepare("SELECT * FROM productos WHERE categoria_id = 1");
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($productos as $producto) {
    echo "<p>$producto[nombre]</p>";
}
$stmt = $pdo->prepare("SELECT * FROM productos WHERE STOCK < 20");
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($productos as $producto) {
    echo "<p>$producto[nombre]</p>";
}
$stmt = $pdo->query("SELECT COUNT(*) AS total FROM productos");
$stmt->execute();
$total = $stmt->fetchColumn();
foreach ($productos as $producto) {
    echo "<p>$producto[nombre]</p>";
}
//Ej4
$stmt = $pdo->prepare("SELECT p.nombre AS producto, p.precio, c.nombre AS categoria FROM productos p INNER JOIN categorias c ON p.categoria_id = c.id ORDER BY  c.nombre ASC, p.precio ASC
");
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($productos);

//Ej8
$pdo->exec("CREATE TABLE IF NOT EXISTS detalles(id INT PRIMARY KEY AUTO_INCREMENT,pedido_id INT NOT NULL, producto_id INT NOT NULL,cantidad INT NOT NULL, precio DECIMAL(10,2) NOT NULL, FOREIGN KEY (pedido_id) REFERENCES pedidos(id), FOREIGN KEY (producto_id) REFERENCES productos(id))");

$stmt = $pdo->query("SELECT p.nombre, SUM(d.cantidad) AS total_vendido FROM detalles d JOIN productos p ON d.producto_id = p.id GROUP BY d.producto_id ORDER BY total_vendido DESC");
$productos_vendidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($productos_vendidos);

$ingresos_por_categoria = $pdo->query("SELECT c.nombre AS categoria, SUM(d.cantidad * d.precio) AS ingresos FROM detalles d
JOIN productos p ON d.producto_id = p.id JOIN categorias c ON p.categoria_id = c.id GROUP BY c.id
ORDER BY ingresos DESC")->fetchAll(PDO::FETCH_ASSOC);
print_r($ingresos_por_categoria);

$stmt = $pdo->query("SELECT nombre, stock FROM productos WHERE stock < 10 ORDER BY stock ASC");
$stock_bajo = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($stock_bajo);

$stmt = $pdo->query("SELECT u.nombre, u.email, COUNT(p.id) AS total_pedidos FROM pedidos p JOIN usuarios u ON p.usuario_id = u.id GROUP BY u.id ORDER BY total_pedidos DESC");
$usuariosConMasCompras = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($usuariosConMasCompras);
?>