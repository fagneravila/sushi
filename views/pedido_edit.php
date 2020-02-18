<h1>Pedido - Editar</h1>
<br><br>
 
<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>
    
    <div class="button"><a href="<?= BASE_URL ?>/pedido/<?=$pedido_info['idtbmesa']?>"> Voltar</a></div>
    <br><br>
  
<form method="POST">
    <label for="text"> Descricao</label><br>
    <input type="text" name="descricao" value="<?php echo $pedido_info['descricao'];?>"/><br><br>
    <input type="hidden" name="idtbpedido" value="<?php echo $pedido_info['idtbpedido'];?>">
    <input type="hidden" name="idtbmesa" value="<?php echo $pedido_info['idtbmesa'];?>">
  <label for="group"> Status</label><br>
    <select name="idtbstatus"  id="group" required="">
        <?php foreach ($status as $g) { ?>
        <option value="<?= $g['idtbstatus'] ?>" <?php echo ($g['idtbstatus'] == $pedido_info['idtbstatus'])?'selected="selected"':''; ?>><?= $g['descricao'] ?></option>
        <?php } ?>
    </select>
  <br><br>
    <input type="submit" value="Editar"/>
</form>