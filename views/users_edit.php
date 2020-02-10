<h1>Usuário - Editar</h1>
<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>
    
  
<form method="Post">
    <label for="email"> E-mail</label><br>
    <?php echo $user_info['email'];?><br><br>
    <label for="password"> Senha</label><br>
    <input type="password" name="password"/><br><br>
    <label for="group"> Grupo de Permissõe</label><br>
    <select name="group"  id="group" required="">
        <?php foreach ($group_list as $g) { ?>
        <option value="<?= $g['id'] ?>" <?php echo ($g['id'] == $user_info['id_group'])?'selected="selected"':''; ?>><?= $g['name'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    <input type="submit" value="Editar"/>
</form>