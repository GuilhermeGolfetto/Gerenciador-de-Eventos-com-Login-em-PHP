<?php
include("seguranca.php");
$usuarios = buscarUsuarios();
$lista_tabelas = buscarTabelas($usuarios);
?>
<table border="1" id="tabelaEventos" class="sortable table table--striped">
    <thead>
    <tr>
        <th>Titulo</th>
        <th>Descrição</th>
        <th>Data/Hora</th>
        <th>Imagem</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($usuarios); $i++): ?>
        <?php for ($j = 0; $j < count($lista_tabelas[$i]); $j++): ?>
            <tr>
                <td>
                    <?php echo $lista_tabelas[$i][$j]['titulo']; ?>
                </td>

                <td>
                    <?php echo $lista_tabelas[$i][$j]['descricao']; ?>
                </td>

                <td>
                    <?php echo $lista_tabelas[$i][$j]['dia']; ?>
                </td>

                <td>
                    <?php echo $lista_tabelas[$i][$j]['endImagem']; ?>
                </td>

                <td>
                    <?php echo $lista_tabelas[$i][$j]['estado']; ?>
                </td>
            </tr>
        <?php endfor; ?>
    <?php endfor; ?>
    </tbody>
</table>