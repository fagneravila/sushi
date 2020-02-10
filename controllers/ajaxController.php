<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ajaxController extends controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $u = new Users(); //verifica se o usuario ta logado
        if ($u->isLogged() == false) {
            header("Location:" . BASE_URL . "/login");
            exit;
        }
    }

    public function index() {
        
    }

    public function search_produto() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $p = new Produto();
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $q = addslashes($_GET['q']);
            $produto = $p->searchProdutoDesc($q);

            foreach ($produto as $pitem) {
                $data[] = array(
                'name' => $pitem['descricao'],
                'link' => BASE_URL.'/produto/edit/'.$pitem['idtbproduto']
                );
            }
        }
        echo json_encode($data);
    }

}
