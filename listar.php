<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($cursos)): ?>
            <?php foreach ($cursos as $curso): ?>
                <tr>
                    <td><?php echo htmlspecialchars($curso['id']); ?></td>
                    <td><?php echo htmlspecialchars($curso['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($curso['codigoCurso']); ?></td>
                    <td><?php echo htmlspecialchars($curso['Descripcion']); ?></td>
                    <td class="actions">
                        <a href="index.php?action=editar&id=<?php echo $curso['id']; ?>">Editar</a>
                        <a href="index.php?action=eliminar&id=<?php echo $curso['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar este curso?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No hay cursos registrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<a class="btn" href="index.php?action=registrar">Nuevo Curso</a>
