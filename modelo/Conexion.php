<?php
class Conexion {
    public static function conectar() {
        $host = "localhost";
        $dbname = "db_cursos";
        $usuario = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}
