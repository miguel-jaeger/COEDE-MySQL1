<form action="index.php?action=guardar" method="post">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required>

    <label for="codigoCurso">Código del Curso:</label>
    <input type="text" id="codigoCurso" name="codigoCurso" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required><?= htmlspecialchars($curso['Descripcion'] ?? '') ?></textarea>



    <input type="submit" value="Guardar">
</form>
