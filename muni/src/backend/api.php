<?php
header('Access-Control-Allow-Origin: *'); // Permitir solicitudes desde cualquier origen
header('Content-Type: application/json'); // El tipo de contenido que devuelve es JSON
include 'db.php'; // Incluye el archivo de conexión a la base de datos

$method = $_SERVER['REQUEST_METHOD']; // Obtiene el método HTTP usado en la solicitud (GET, POST, PUT, DELETE)

switch ($method) {
    case 'GET': // Caso de método GET para leer datos
        $sql = "SELECT * FROM usuarios"; // Consulta para seleccionar todos los usuarios
        $stmt = $pdo->prepare($sql); // Prepara la consulta
        $stmt->execute(); // Ejecuta la consulta
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene los resultados en un array asociativo
        echo json_encode($usuarios); // Devuelve los datos como un JSON
        break;

    case 'POST': // Caso de método POST para crear un nuevo usuario
        $data = json_decode(file_get_contents("php://input")); // Lee el cuerpo de la solicitud y lo convierte en objeto PHP
        $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)"; // Consulta SQL para insertar un usuario
        $stmt = $pdo->prepare($sql); // Prepara la consulta
        // Asigna los valores de nombre y email a los parámetros de la consulta
        $stmt->bindParam(':nombre', $data->nombre); 
        $stmt->bindParam(':email', $data->email);
        // Ejecuta la consulta y devuelve un mensaje JSON
        if ($stmt->execute()) {
            echo json_encode(['status' => 'Usuario creado']);
        } else {
            echo json_encode(['status' => 'Error al crear']);
        }
        break;

    case 'PUT': // Caso de método PUT para actualizar un usuario existente
        $data = json_decode(file_get_contents("php://input")); // Lee y convierte el JSON de la solicitud a un objeto PHP
        $sql = "UPDATE usuarios SET nombre = :nombre, email = :email WHERE id = :id"; // Consulta SQL para actualizar un usuario
        $stmt = $pdo->prepare($sql); // Prepara la consulta
        // Asigna los valores de nombre, email e id a los parámetros de la consulta
        $stmt->bindParam(':nombre', $data->nombre);
        $stmt->bindParam(':email', $data->email);
        $stmt->bindParam(':id', $data->id);
        // Ejecuta la consulta y devuelve un mensaje JSON
        if ($stmt->execute()) {
            echo json_encode(['status' => 'Usuario actualizado']);
        } else {
            echo json_encode(['status' => 'Error al actualizar']);
        }
        break;

    case 'DELETE': // Caso de método DELETE para eliminar un usuario existente
        $data = json_decode(file_get_contents("php://input")); // Lee y convierte el JSON de la solicitud a un objeto PHP
        $sql = "DELETE FROM usuarios WHERE id = :id"; // Consulta SQL para eliminar un usuario
        $stmt = $pdo->prepare($sql); // Prepara la consulta
        $stmt->bindParam(':id', $data->id); // Asigna el valor del id a los parámetros de la consulta
        // Ejecuta la consulta y devuelve un mensaje JSON
        if ($stmt->execute()) {
            echo json_encode(['status' => 'Usuario eliminado']);
        } else {
            echo json_encode(['status' => 'Error al eliminar']);
        }
        break;
}
/*

header: Las cabeceras Access-Control-Allow-Origin permiten que otros dominios accedan a tu API, y Content-Type define que la respuesta es en formato JSON.

$_SERVER['REQUEST_METHOD']: Detecta el método HTTP (GET, POST, PUT, DELETE) que está siendo usado.

switch($method): Aquí se ejecuta una operación dependiendo del método HTTP que se haya recibido.

GET: Selecciona y devuelve todos los usuarios.

POST: Inserta un nuevo usuario con los datos recibidos en el cuerpo de la solicitud.

PUT: Actualiza un usuario con los datos proporcionados.

DELETE: Elimina un usuario según el ID proporcionado.

json_encode(): Convierte los datos en formato JSON para devolverlos al frontend.

*/ 
?>
