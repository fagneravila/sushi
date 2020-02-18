<?php /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<h1>Cozinha</h1>


   
      
     <div class="button"><a href="<?= BASE_URL ?>/mesa"> Voltar </a></div>
      
<table border="0" width="100%">
    <thead>
        <tr>
            <th>Item</th>
            <th>Descriçao</th>
            <th>Qantidade</th>
             <th>Ação</th>
        </tr>
    </thead>
<tbody>
        <?php foreach ($cozinha_list as $i) { ?>
            <tr>
             
                <td width="30"><?= $i['idtbpedido'] ?></td>
                 <td width="150"><?= $i['descricao'] ?></td>
                  <td width="20"><?= $i['quantidade'] ?></td>
                 <td width="160px">
                    <?php //if ($edit_inventory) { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/cozinha/edit/<?= $i['idtbpedido'] ?>/<?= $i["idtbmesa"]?>">Editar</a></div>
                        <!--<div class="button button_small"><a href="<?= BASE_URL ?>/cozinha/delete/<?= $i['idtbcozinha'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>-->               
                      
                   
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    <?php for ($i = 1; $i <= $c_count; $i++) { ?>
    <div class="pag_item <?php echo ($i == $p)?'pag_ativo':''; ?>"><a href="<?= BASE_URL ?>/cozinha?p=<?php echo $i; ?>"><?php echo $i; ?></a></div>             
    <?php } ?>
        <div style="clear:both"></div>
</div>