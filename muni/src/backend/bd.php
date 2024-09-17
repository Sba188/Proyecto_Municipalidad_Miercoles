<?php
$host = 'localhost'; // Nombre del servidor donde se aloja la base de datos
$db = 'mi_bd'; // Nombre de la base de datos a la que quieres conectarte
$user = 'root'; // Usuario de la base de datos MySQL, normalmente es 'root' en entornos locales
$password = ''; // Contraseña de MySQL, en local puede estar vacía

try {
    // Se crea un objeto PDO que establece la conexión con MySQL
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    
    // Aquí se establece que PDO manejará los errores mediante excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si hay un error en la conexión, este bloque lo captura y muestra un mensaje
    die("Error en la conexión: " . $e->getMessage());
}
?>
