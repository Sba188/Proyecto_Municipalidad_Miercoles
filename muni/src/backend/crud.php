<?php
$host = 'localhost'; // IP del servidor MySQL externo
// $port = '4200'; //Puerto del servidor mysql
$dbname = 'Investigacion_Miercoles';
$username = 'root'; // Tu nombre de usuario de MySQL
$password = ''; // Tu contraseña de MySQL


$conn = new mysqli ($host, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Conexion fallida: " . $conn->connect_error);
}

$method = $_SERVER ['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $result = $conn -> query ("SELECT * FROM users");
        $data = $result -> fetch_all (MYSQL_ASSOC);
        echo json_encode($data);
        break;

    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);
        $username = $input ['username'];
        $email = $input['email'];
        $lastname = $input ['lastname'];
        $conn->query("INSERT INTO users (username, email, lastname) VALUES('hola','hola123@gmail.com','hola123')");
        break;
    case 'DELETE':
        $id = $_GET['id'];
        $conn->query("DELETE FROM users WHERE id=$id");
        break;
}   

?>