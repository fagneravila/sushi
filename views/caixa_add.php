<?php /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<h1>Adicionar Evento</h1>


  
  
    
    <form method="POST">
        <label for="group">Valor </label><br>
        <input type="number" name="valor" value=" " /><br>
      <label for="group"> Forma de Pagamenro</label><br>
    <select name="idtbtipopagamento"  id="group" required="">
        <?php foreach ($pag as $g) { ?>
        <option value="<?= $g['idtbtipopagamento'] ?>" > <?= $g['descricao'] ?></option>
        <?php } ?>
    </select>
    <br><br>
    
    <input type="submit" value="Salvar"/>
</form>
