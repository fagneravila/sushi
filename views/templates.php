<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Painel - <?php echo $viewData['company_name']; ?></title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/templates.css" type="text/css">
        <script src="<?= BASE_URL ?>/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">var BASE_URL = '<?= BASE_URL ?>';</script>
        <script src="<?= BASE_URL ?>/assets/js/script.js" type="text/javascript"></script>
        <link href="<?= BASE_URL ?>/assets/css/icon/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div class="leftmenu">
            <div class="company_name"><?php echo $viewData['usuarioFuncao']; ?></div>
            <div class="menu_area"> 
                <ul>          
                    <li><a href="<?= BASE_URL ?>"><i class="fa fa-university" aria-hidden="true"></i> Home</a></li>
                    <li><a href="<?= BASE_URL ?>/caixa"><i class="fa fa-lock" aria-hidden="true"></i> Conta</li>
                    <li><a href="<?= BASE_URL ?>/users"><i class="fa fa-user" aria-hidden="true"></i> Usuários</li>
                    <li><a href="<?= BASE_URL ?>/mesa"><i class="fa fa-users" aria-hidden="true"></i> Mesa / Comanda</li>            
                    <li><a href="<?= BASE_URL ?>/produto"><i class="fa fa-archive" aria-hidden="true"></i> Produtos</li>
                     <li><a href="<?= BASE_URL ?>/cozinha"><i class="fa fa-archive" aria-hidden="true"></i> Cozinha</li>
                </ul>
            </div>   
        </div>
        <div class="container">
            <div class="top">
                <div class="top_right"><a href="<?php echo BASE_URL . '/login/logout'; ?>"> Sair</a></div>
                <div class="top_right"><?= $viewData['usuarioNome'] ?></div>
            </div>
            <div class="area">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>
        </div>

    </body>
</html>