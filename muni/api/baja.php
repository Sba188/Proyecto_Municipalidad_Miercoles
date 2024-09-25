<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');


  include("conexion.php");

   // Verificamos si el parámetro IdUsuarios está presente
  if (isset($_GET['id'])) {
      $id = $_GET['id'];

      // Preparamos la consulta usando PDO
      try {
          $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
          $stmt->bindParam(':id', $id);

          if ($stmt->execute()) {
              $response = ['resultado' => 'OK', 'mensaje' => 'Usuario borrado'];
          } else {
              $response = ['resultado' => 'ERROR', 'mensaje' => 'Error al borrar usuario'];
          }
      } catch (PDOException $e) {
          $response = ['resultado' => 'ERROR', 'mensaje' => 'Error en la base de datos: ' . $e->getMessage()];
      }

  } else {
      $response = ['resultado' => 'ERROR', 'mensaje' => 'Falta el parámetro IdUsuarios'];
  }

  header('Content-Type: application/json');
  echo json_encode($response);

  
?>