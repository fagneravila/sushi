<h1>Usuário - Adicionar</h1>
<?php if (isset($error_msg) && !empty($error_msg)) { ?>
    <div class="warn">   <?= $error_msg; ?> </div>   
<?php } ?>

<form method="Post">
    <label for="email">Nome:> </label><br>
    <input type="text" name="nome"required/><br><br>
    <label for="password"> Senha</label><br>
    <input type="password" name="nome" required/><br><br>
    <label for="group"> Fincao</label><br>
    <select name="group"  id="group" required="">
        <?php foreach ($funcao_list as $g) { ?>
            <option value="<?= $g['idtbfuncao'] ?>"><?= $g['descricao'] ?></option>
        <?php } ?>
    </select>
    <br><br>

    <input type="submit" value="Adicionar"/>
</form>