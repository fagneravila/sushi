<h1>Mesa - Editar</h1>
<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>
    
  
<form method="Post">
    <label for="text"> Descricao</label><br>
   
    <input type="text" name="descricao" value=" <?php echo $mesa_info['descricao'];?>"/><br><br><br><br>
     <label for="group"> Situação</label><br>
    <select name="idtbsituacaomesa"  id="group" required="">
        <?php foreach ($mesa_list as $g) { ?>
        <option value="<?= $g['idtbsituacaomesa'] ?>" <?php echo ($g['idtbsituacaomesa'] == $mesa_info['idtbsituacaomesa'])?'selected="selected"':''; ?>><?= $g['descricao'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    <input type="submit" value="Editar"/>
</form>