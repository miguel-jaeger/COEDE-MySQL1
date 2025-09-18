<?php
require_once "controlador/Controlador.php";

$controlador = new Controlador();

$action = $_GET['action'] ?? 'listar';

// Procesar formulario para guardar nuevo curso
if ($action === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $codigoCurso = $_POST['codigoCurso'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';

    if ($titulo && $codigoCurso && $descripcion) {
        $controlador->registrar($titulo, $codigoCurso, $descripcion);
        header("Location: index.php");
        exit;
    } else {
        $error = "Por favor, completa todos los campos.";
    }
}

// Procesar formulario para actualizar curso
if ($action === 'actualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $titulo = $_POST['titulo'] ?? '';
    $codigoCurso = $_POST['codigoCurso'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';

    if ($id && $titulo && $codigoCurso && $descripcion) {
        $controlador->actualizar($id, $titulo, $codigoCurso, $descripcion);
        header("Location: index.php");
        exit;
    } else {
        $error = "Por favor, completa todos los campos para actualizar.";
    }
}

// Procesar eliminación
if ($action === 'eliminar') {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $controlador->eliminar($id);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema de Gestión de Cursos</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('img/php.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            color: #fff;
            padding-top: 120px; 
        }

        .container {
            background-color: rgba(30, 30, 50, 0.95); /* Fondo oscuro semi-transparente */
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.7); /* Sombra oscura más marcada */
            width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            text-align: center;
            color: #f0f0f0; /* Texto blanco claro para buen contraste */
        }

        /* Galería de imágenes */
        .image-gallery {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 600px;
            background-color: rgba(0,0,0,0.5);
            padding: 10px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
            z-index: 1000;
        }

        .image-gallery img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 4px 8px rgba(0,0,0,0.5);
            transition: transform 0.3s ease;
            cursor: default;
        }

        .image-gallery img:hover {
            transform: scale(1.1);
            border-color: #fff;
        }

        h1 {
            margin-bottom: 30px;
            font-weight: 700;
            color: #fff; /* título blanco */
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7); /* sombra para mejorar visibilidad */
        }

        /* Botones */
        .btn {
            background-color: #6c63ff;
            border: none;
            padding: 12px 25px;
            margin: 10px 5px;
            color: white;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background-color: #574b90;
        }

        /* Formularios */
        form label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            text-align: left;
            color: #ddd; /* etiqueta en gris claro */
        }

        form input[type="text"],
        form textarea,
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
        }

        form input[type="text"],
        form textarea {
            border: 1px solid #555;
            background-color: #222;
            color: #eee;
            resize: vertical;
        }

        form input[type="text"]::placeholder,
        form textarea::placeholder {
            color: #bbb;
        }

        form input[type="submit"] {
            background-color: #6c63ff;
            color: white;
            cursor: pointer;
            font-weight: 700;
            margin-top: 25px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #574b90;
        }

        /* Tabla para listar */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #f0f0f0;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        table th {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .actions a {
            margin-right: 10px;
            color: #a0a0ff;
            text-decoration: none;
            font-weight: 600;
        }

        .actions a:hover {
            color: white;
            text-decoration: underline;
        }

        a.back-link {
            color: #a0a0ff;
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
        }

        a.back-link:hover {
            color: white;
            text-decoration: underline;
        }

        .error {
            background-color: rgba(255, 0, 0, 0.7);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Galería de imágenes fija arriba -->
    <div class="image-gallery">
        <figure>
        <img src="img/ivan.jpg" alt="Iván">
        <figcaption>De La Cruz</figcaption>
        </figure>
        <figure>
        <img src="img/cordova.jpg" alt="Córdoba">
        <figcaption>Córdova</figcaption>
        </figure>
        <figure>
        <img src="img/bermejo.jpg" alt="Bermejo">
        <figcaption>Bermejo</figcaption>
        </figure>
        <figure>
        <img src="img/lopez.jpg" alt="López">
        <figcaption>López</figcaption>
        </figure>
    </div>

    <div class="container">

        <h1>Gestión de Cursos</h1>

        <?php if (!empty($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php switch ($action):
            case 'registrar': ?>
                <a class="btn" href="index.php">← Volver a lista</a>
                <?php include "vista/registrar.php"; ?>
                <?php break; ?>

            <?php case 'editar':
                $id = $_GET['id'] ?? null;
                if (!$id) {
                    header("Location: index.php");
                    exit;
                }
                $curso = $controlador->obtenerCurso($id);
                ?>
                <a class="btn" href="index.php">← Volver a lista</a>
                <?php include "vista/editar.php"; ?>
                <?php break; ?>

            <?php default:
                $cursos = $controlador->listar();
                include "vista/listar.php";
            endswitch; 
        ?>

    </div>
</body>
</html>
