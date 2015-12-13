<table border="1" id="tabelaEventos" class="sortable table table--striped">
    <thead>
    <tr>
        <th>Titulo</th>
        <th>Descrição</th>
        <th>Data/Hora</th>
        <th>Imagem</th>
        <th>Status</th>
        <th>Opções</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($lista_evento as $evento): ?>
        <tr>
            <td>
                <?php echo $evento['titulo']; ?>
            </td>
            <td>
                <?php echo $evento['descricao']; ?>
            </td>
            <td>
                <?php echo $evento['dia']; ?>
            </td>
            <td>
                <?php if (!$evento['endImagem'] == '')
                    echo "<a href='{$evento['endImagem']}'>Imagem</a>";
                else
                    echo "sem imagem";
                ?>
            </td>
            <td>
                <?php echo $evento['estado']; ?>
            </td>
            <td>
                <a href="edita.php?id=<?php echo $evento['id']; ?>">Editar</a> -
                <a href="remover.php?id=<?php echo $evento['id']; ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

