<h1>Mesa - Editar</h1>

<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>
     <div class="button"><a href="<?= BASE_URL ?>/mesa "> Voltar </a></div>
     <br><br>
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