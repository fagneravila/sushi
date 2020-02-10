<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produtoController
 *
 * @author fagne
 */
class produtoController extends controller {
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
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();

       
            $prod = new Produto();
            $offset = 0;
            $data["p"]=1;
             if (isset($_GET['p']) && !empty($_GET['p'])){
                 $data["p"]= intval($_GET['p']);
                 if($data['p']==0){
                     $data["p"]=1;
                 }
             }
             $offset = (10 *($data["p"]-1));
             
            $data['produto_list'] = $prod->getList($offset);
            $data['produto_count'] = $prod->getCount();
            $data['p_count']= ceil($data['produto_count']/5);
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('produto', $data);
       
    }
    
    
    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
      //  if ($u->hasPermissions('clients_edit')) {
            $p = new Produto();

            if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
                $descricao = addslashes($_POST['descricao']);
                $valor = addslashes($_POST['valor']);
                $p->add(
                        $descricao, 
                        $valor
                      );
              
                header("Location:" . BASE_URL . "/produto");
            }

            $this->loadTemplate('produto_add', $data);
     //   } else {
            
       //     header("Location:" . BASE_URL . "/clients");
       // }
    }
    
    
     public function edit($idtbproduto) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
      //  if ($u->hasPermissions('clients_edit')) {
            $p = new Produto();

           if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
                $descricao = addslashes($_POST['descricao']);
                $valor = addslashes($_POST['valor']);
               
             
                $p->edit($idtbproduto, $descricao,$valor);
                header("Location:" . BASE_URL . "/produto");
            }

           $data['produto_info'] = $p->getInfo($idtbproduto);
           
            $this->loadTemplate('produto_edit', $data);
        //} else {
          //  header("Location:" . BASE_URL);
        //}
    }

    public function delete($idtbproduto) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
       // if ($u->hasPermissions('clients_edit')) {
            $p = new Produto();
            $p->delete($idtbproduto);
            header("Location:" . BASE_URL . "/produto");
        //} else {
          //  header("Location:" . BASE_URL);
        //}
    }
    
    

}
