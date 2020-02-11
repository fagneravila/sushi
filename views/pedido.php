<?php /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<h1>Pedido</h1>

<?php //if ($edit_pedido) { ?>
    <div class="button"><a href="<?= BASE_URL ?>/pedido/add"> Adicionar Pedido - <?= $mesainfo["descmesa"]?> </a></div>
<?php //} ?>
    <input type="text" id="busca" data-type="search_pedido"/>
<table border="0" width="100%">
    <thead>
        <tr>
            <th>Item</th>
            <th>Descriçao</th>
            <th>Qantidade</th>
             <th>Valor</th>
             <th>Situacao</th>
             <th>Ação</th>
        </tr>
    </thead>
<tbody>
        <?php foreach ($pedido_list as $i) { ?>
            <tr>
             
                <td width="30"><?= $i['idtbpedido'] ?></td>
                 <td width="150"><?= $i['descricao'] ?></td>
                  <td width="20"><?= $i['quantidade'] ?></td>
                <td width="30">R$ <?= number_format($i['VALOR'],2) ?></td>
                 <td width="50"><?= $i['STATUSDESCRICAO'] ?></td>
                <td width="160px">
                    <?php //if ($edit_inventory) { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/pedido/edit/<?= $i['idtbpedido'] ?>">Editar</a></div>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/pedido/delete/<?= $i['idtbpedido'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
                    <?php //} else { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/pedido/view/<?= $i['idtbpedido'] ?>">Visualizar</a></div>
                    <?php //} ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    <?php for ($i = 1; $i <= $p_count; $i++) { ?>
    <div class="pag_item <?php echo ($i == $p)?'pag_ativo':''; ?>"><a href="<?= BASE_URL ?>/pedido?p=<?php echo $i; ?>"><?php echo $i; ?></a></div>             
    <?php } ?>
        <div style="clear:both"></div>
</div>
