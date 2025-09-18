<?php
require_once "Conexion.php";

class Modelo {
    public static function listarCursos() {
        $sql = "SELECT * FROM cursos";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function registrarCurso($titulo, $codigoCurso, $descripcion) {
        $sql = "INSERT INTO cursos (titulo, codigoCurso, Descripcion) VALUES (?, ?, ?)";
        $stmt = Conexion::conectar()->prepare($sql);
        return $stmt->execute([$titulo, $codigoCurso, $descripcion]);
    }

    public static function eliminarCurso($id) {
        $sql = "DELETE FROM cursos WHERE id = ?";
        $stmt = Conexion::conectar()->prepare($sql);
        return $stmt->execute([$id]);
    }

    public static function obtenerCursoPorId($id) {
        $sql = "SELECT * FROM cursos WHERE id = ?";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function actualizarCurso($id, $titulo, $codigoCurso, $descripcion) {
        $sql = "UPDATE cursos SET titulo = ?, codigoCurso = ?, Descripcion = ? WHERE id = ?";
        $stmt = Conexion::conectar()->prepare($sql);
        return $stmt->execute([$titulo, $codigoCurso, $descripcion, $id]);
    }
}
