<?php /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>

<<<<<<< HEAD
<<<<<<< HEAD
<h1>Conta</h1>

<?php //if ($edit_mesa) { ?>
    <div class="button"><a href="<?= BASE_URL ?>/caixa/add"> Adicionar</a></div>
<?php //} ?>
    <!--<input type="text" id="busca" data-type="search_caixa"/>-->
    
     <div class="col-md-6">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Pesquisa">
                        <script>
                            $(document).ready(function () {
                                $("#myInput").on("keyup", function () {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });
                        </script>
                    </div> 
    <table border="0" width="100%" id="myTable">
    <thead>
        <tr>
            <th>Descricao</th>
=======
=======
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
<h1>Caixa</h1>

<?php //if ($edit_produto) { ?>
    <div class="button"><a href="<?= BASE_URL ?>/produto/add"> Adicionar Produto</a></div>
<?php //} ?>
    <input type="text" id="busca" data-type="search_produto"/>
<table border="0" width="100%">
    <thead>
        <tr>
            <th>Nome</th>
<<<<<<< HEAD
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
=======
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
            <th>Valor</th>
            <th>Data</th>
        </tr>
    </thead>
<tbody>
        <?php foreach ($caixa_list as $i) { ?>
            <tr>
             
                <td width="150"><?= $i['descricao'] ?></td>
<<<<<<< HEAD
<<<<<<< HEAD
                <td width="150">R$ <?= number_format($i['valor'],2) ?> </td>
                 <td width="150"><?= $i['DATA']?> </td>
                <!--<td width="160px">
                    <?php //if ($edit_inventory) { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/mesa/edit/<?= $i['idtbmesa'] ?>">Editar</a></div>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/mesa/delete/<?= $i['idtbmesa'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></div>
                    <?php //} else { ?>
                        <div class="button button_small"><a href="<?= BASE_URL ?>/pedido/view/<?= $i['idtbmesa'] ?>">Adicionar Pedido</a></div>
                    <?php //} ?>
                </td>-->
=======
=======
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
                <td width="150">R$ <?= number_format($i['valor'],2) ?></td>
                <td width="160px">
                  <?= $i['data'] ?>
                </td>
<<<<<<< HEAD
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
=======
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="pagination">
<<<<<<< HEAD
<<<<<<< HEAD
    <?php for ($i = 1; $i <= $c_count; $i++) { ?>
    <div class="pag_item <?php echo ($i == $p)?'pag_ativo':''; ?>"><a href="<?= BASE_URL ?>/caixa?p=<?php echo $i; ?>"><?php echo $i; ?></a></div>             
    <?php } ?>
        <div style="clear:both"></div>
</div>
=======
=======
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
    <?php for ($i = 1; $i <= $p_count; $i++) { ?>
    <div class="pag_item <?php echo ($i == $p)?'pag_ativo':''; ?>"><a href="<?= BASE_URL ?>/produto?p=<?php echo $i; ?>"><?php echo $i; ?></a></div>             
    <?php } ?>
        <div style="clear:both"></div>
</div>

<<<<<<< HEAD
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
=======
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
