<?php /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<h1>Produto</h1>

<?php //if ($edit_produto) { ?>
    <div class="button"><a href="<?= BASE_URL ?>/produto/add"> Adicionar Produto</a></div>
<?php //} ?>
    <input type="text" id="busca" data-type="search_produto"/>
<table border="0" width="100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
<tbody>
        <?php foreach ($produto_list as $i) { ?>
            <tr>
             
                <td width="150"><?= $i['descricao'] ?></td>
                <td width="150">R$ <?= number_format($i['valor'],2) ?></td>
                <td width="160px">
                    <?php //if ($edit_inventory) { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/produto/edit/<?= $i['idtbproduto'] ?>">Editar</a></div>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/produto/delete/<?= $i['idtbproduto'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
                    <?php //} else { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/produto/view/<?= $i['idtbproduto'] ?>">Visualizar</a></div>
                    <?php //} ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    <?php for ($i = 1; $i <= $p_count; $i++) { ?>
    <div class="pag_item <?php echo ($i == $p)?'pag_ativo':''; ?>"><a href="<?= BASE_URL ?>/produto?p=<?php echo $i; ?>"><?php echo $i; ?></a></div>             
    <?php } ?>
        <div style="clear:both"></div>
</div>
