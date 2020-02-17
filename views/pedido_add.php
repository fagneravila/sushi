<h1>Adicionar  2- <?=$mesainfo['descricao']?></h1>
<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>
    
    <div class="button"><a href="<?= BASE_URL ?>/pedido/preadd/ <?= $mesainfo["idtbmesa"]?> "> Voltar </a></div><br>
    <br>
    <form method="Post" action="add">
    <label for="text"> Descricao</label><br>
    <input type="text" name="descricao" value="<?php echo $produto_info['descricao'];?>" disabled="true"/><br><br>
    <input type="hidden" name="idtbmesa" value="<?php echo $mesainfo['idtbmesa'];?>"/><br><br>
    <input type="hidden" name="idtbproduto" value="<?php echo $produto_info['idtbproduto'];?>"/><br><br>
    <label for="number"> Valor</label><br>
    <input type="number" name="valor" step="0.01" value="<?php echo $produto_info['valor'];?>" disabled="true"/><br><br>
     <label for="number"> Quantidade</label><br>
    <input type="number" name="quantidade"><br><br>
 

    <input type="submit" value="Adicionar"/>
</form>