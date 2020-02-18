<h1>Produto - Editar</h1>
<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>
    
  
<form method="Post">
    <label for="text"> Descricao</label><br>
    <input type="text" name="descricao" value="<?php echo $produto_info['descricao'];?>"/><br><br>
    <label for="number"> Valor</label><br>
    <input type="number" name="valor" step="0.01" value="<?php echo $produto_info['valor'];?>"/><br><br>
 

    <input type="submit" value="Editar"/>
</form>