<?php
// app/controllers/ProductController.php

include_once '../models/Group.php';
include_once '../core/Database.php';

class GroupController {
    private $db;
    private $grupo;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->grupo = new Group($this->db);
    }

    // Obtener todos los productos
    public function getAll() {
        $stmt = $this->grupo->getAll();
        $grupo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($grupo);
    }

    // Obtener un producto por ID
    public function getById($groupId) {
        $grupo = $this->grupo->getById($groupId);
        return json_encode($grupo);
    }

    // Crear un nuevo producto
    public function create($data) {
        $this->grupo->descripcion = $data->descripcion;
        
        if ($this->grupo->create()) {
            return json_encode(["message" => "OK"]);
        }
        return json_encode(["message" => "Error al crear el producto"]);
    }

    // Actualizar un producto
    public function update($groupId, $data) {
        $this->grupo->descripcion = $data->descripcion;
        if ($this->grupo->update($groupId)) {
            return json_encode(["message" => "OK"]);
        }
        return json_encode(["message" => "Error al actualizar el producto"]);
    }

    // Eliminar un producto
    public function delete($groupId) {
        if ($this->grupo->delete($groupId)) {
            return json_encode(["message" => "OK"]);
        }
        return json_encode(["message" => "Error al eliminar el producto"]);
    }
}
?>