<?php /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<h1>Deta</h1>


  
        <div class="button"><a href="<?= BASE_URL ?>/pedido/view/ <?= $mesainfo["idtbmesa"]?> "> Voltar - <?= $mesainfo["descricao"]?> </a></div>

    <input type="text" id="busca" data-type="search_pedido"/>
<table border="0" width="100%">
    <thead>
        <tr>
            <th>Item</th>
            <th>Descriçao</th>
            <th>Qantidade</th>
            <th>Valor Unitário</th>
             <th>Valor Total</th>
       
        </tr>
    </thead>
<tbody>
        <?php foreach ($pedido_list as $i) { ?>
            <tr>
             
                <td width="30"><?= $i['idtbpedido'] ?></td>
                 <td width="100"><?= $i['descricao'] ?></td>
                  <td width="20"><?= $i['quantidade'] ?></td>
                   <td width="20"><?= $i['VALORUNITARIO'] ?></td>
                <td width="30">R$ <?= number_format($i['VALOR'],2) ?></td>
               
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
    
</div>
    
    <form method="Post">
    <input type="hidden" name="valor" value=" <?= $i['VALOR']?>" /><br>
    <input type="hidden" name="idmesa" value=" <?php echo $mesainfo['idtbemesa'];?>"/><br>
     <label for="group"> Forma de Pagamenro</label><br>
    <select name="idtbtipopagamento"  id="group" required="">
        <?php foreach ($pag as $g) { ?>
        <option value="<?= $g['idtbtipopagamento'] ?>" > <?= $g['descricao'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    <input type="submit" value="Pagar"/>
</form>
