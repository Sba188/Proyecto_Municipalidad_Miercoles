<?php
// app/controllers/ProductController.php

include_once '../models/User.php';
include_once '../core/Database.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Obtener todos los productos
    public function getAll() {
        $stmt = $this->user->getAll();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($user);
    }

    // Obtener un producto por ID
    public function getById($userId) {
        $user = $this->user->getById($userId);
        return json_encode($user);
    }

    // Crear un nuevo producto
    public function create($data) {
        $this->user->username = $data->username;
        $this->user->mail = $data->mail;
        $this->user->password = $data->password;
        $this->user->grupoId = $data->grupoId;
        if ($this->user->create()) {
            return json_encode(["message" => "OK"]);
        }
        return json_encode(["message" => "Error al crear el producto"]);
    }

    // Actualizar un producto
    public function update($userId, $data) {
        $this->user->username = $data->username;
        $this->user->mail = $data->mail;
        $this->user->password = $data->password;
        $this->user->grupoId = $data->grupoId;
        if ($this->user->update($userId)) {
            return json_encode(["message" => "OK"]);
        }
        return json_encode(["message" => "Error al actualizar el producto"]);
    }

    // Eliminar un producto
    public function delete($userId) {
        if ($this->user->delete($userId)) {
            return json_encode(["message" => "OK"]);
        }
        return json_encode(["message" => "Error al eliminar el producto"]);
    }


     // Autenticar usuario
     public function login($data)
     {
         $mail = $data->mail;
         $password = $data->password;
         $user = $this->user->authenticate($mail, $password);
         if ($user) {
             return json_encode(["resultado" => "OK", "usuario" => $user]);
         } else {
             return json_encode(["resultado" => "Error", "mensaje" => "Credenciales incorrectas"]);
         }
     }
}
?>