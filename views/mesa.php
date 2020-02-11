<?php /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<h1>Mesa / Comanda</h1>

<?php //if ($edit_mesa) { ?>
    <div class="button"><a href="<?= BASE_URL ?>/mesa/add"> Adicionar Mesa/Comanda</a></div>
<?php //} ?>
    <input type="text" id="busca" data-type="search_mesa"/>
<table border="0" width="100%">
    <thead>
        <tr>
            <th>Descricao</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
<tbody>
        <?php foreach ($mesa_list as $i) { ?>
            <tr>
             
                <td width="150"><?= $i['descricao'] ?></td>
                <td width="150"><?= $i['status']?> </td>
                <td width="160px">
                    <?php //if ($edit_inventory) { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/mesa/edit/<?= $i['idtbmesa'] ?>">Editar</a></div>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/mesa/delete/<?= $i['idtbmesa'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
                    <?php //} else { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/pedido/view/<?= $i['idtbmesa'] ?>">Visualizar</a></div>
                    <?php //} ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    <?php for ($i = 1; $i <= $m_count; $i++) { ?>
    <div class="pag_item <?php echo ($i == $p)?'pag_ativo':''; ?>"><a href="<?= BASE_URL ?>/mesa?p=<?php echo $i; ?>"><?php echo $i; ?></a></div>             
    <?php } ?>
        <div style="clear:both"></div>
</div>
