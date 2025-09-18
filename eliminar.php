<link rel="stylesheet" href="vista/estilos.css">
<div class="container">
    <h2>¿Estás seguro que deseas eliminar este curso?</h2>
    <p><strong><?= $curso['titulo'] ?></strong> (<?= $curso['codigoCurso'] ?>)</p>
    <form action="index.php?action=confirmarEliminar&id=<?= $curso['id'] ?>" method="post">
        <input type="submit" value="Sí, eliminar">
        <a href="index.php">Cancelar</a>
    </form>
</div>
