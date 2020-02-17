<h1>Produto - Adicionar</h1>
<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>
    <div class="button"><a href="<?= BASE_URL ?>/produto"> Voltar</a></div><br><br>
<form method="Post">
    <label for="email">Descricao: </label><br>
    <input type="text" name="descricao"required/><br><br>
    <label for="number"> Valor</label><br>
    <input type="number" step="0.01" name="valor" required/><br><br>
   
    <input type="submit" value="Adicionar"/>
</form>
