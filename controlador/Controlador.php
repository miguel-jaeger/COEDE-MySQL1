<?php
require_once "modelo/Modelo.php";

class Controlador {
    public function registrar($titulo, $codigoCurso, $descripcion) {
        return Modelo::registrarCurso($titulo, $codigoCurso, $descripcion);
    }

    public function listar() {
        return Modelo::listarCursos();
    }

    public function eliminar($id) {
        return Modelo::eliminarCurso($id);
    }

    public function obtenerCurso($id) {
        return Modelo::obtenerCursoPorId($id);
    }

    public function actualizar($id, $titulo, $codigoCurso, $descripcion) {
        return Modelo::actualizarCurso($id, $titulo, $codigoCurso, $descripcion);
    }
}