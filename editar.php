<form action="index.php?action=actualizar" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($curso['id']) ?>">
    
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($curso['titulo']) ?>" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required><?= htmlspecialchars($curso['Descripcion']) ?></textarea>

    <label for="codigoCurso">Código del Curso:</label>
    <input type="text" id="codigoCurso" name="codigoCurso" value="<?= htmlspecialchars($curso['codigoCurso']) ?>" required>

    <input type="submit" value="Actualizar">
</form>
