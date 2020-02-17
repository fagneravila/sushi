<h1>Mesa / Comanda - Adicionar</h1>
<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>
<div class="button"><a href="<?= BASE_URL ?>/mesa "> Voltar </a></div>
     <br><br>
    <form method="POST" action="">
    <label for="nome">Descricao: </label><br>
    <input type="text" name="descricao" required/><br><br>
    <select name="idtbsituacaomesa"  id="group" required="">
        <?php foreach ($mesa_list as $m) { ?>
            <option value="<?= $m['idtbsituacaomesa'] ?>"><?= $m['descricao'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    <input type="submit" value="Adicionar"/>
</form>