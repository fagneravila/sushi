<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pedidoController
 *
 * @author fagne
 */
class pedidoController extends controller {
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

       
            $prod = new Pedido();
            $offset = 0;
            $data["p"]=1;
             if (isset($_GET['p']) && !empty($_GET['p'])){
                 $data["p"]= intval($_GET['p']);
                 if($data['p']==0){
                     $data["p"]=1;
                 }
             }
             $offset = (10 *($data["p"]-1));
             
            $data['pedido_list'] = $prod->getList($offset);
            $data['pedido_count'] = $prod->getCount();
            $data['p_count']= ceil($data['pedido_count']/5);
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('pedido', $data);
       
    }
    
      public function view($idtbmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();

       
            $prod = new Pedido($idtbmesa);
            $offset = 0;
            $data["p"]=1;
             if (isset($_GET['p']) && !empty($_GET['p'])){
                 $data["p"]= intval($_GET['p']);
                 if($data['p']==0){
                     $data["p"]=1;
                 }
             }
             $offset = (10 *($data["p"]-1));
            $data['mesainfo'] = $prod->getInfo($idtbmesa) ;
            $data['pedido_list'] = $prod->getList($offset,$idtbmesa);
            $data['pedido_count'] = $prod->getCount($idtbmesa);
            $data['p_count']= ceil($data['pedido_count']/5);
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('pedido', $data);
       
    }
    
    
    
    
    
    
    
    
    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
      //  if ($u->hasPermissions('clients_edit')) {
            $p = new pedido();

            if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
                $descricao = addslashes($_POST['descricao']);
                $valor = addslashes($_POST['valor']);
                $p->add(
                        $descricao, 
                        $valor
                      );
              
                header("Location:" . BASE_URL . "/pedido");
            }

            $this->loadTemplate('pedido_add', $data);
     //   } else {
            
       //     header("Location:" . BASE_URL . "/clients");
       // }
    }
    
    
     public function edit($idtbpedido) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
      //  if ($u->hasPermissions('clients_edit')) {
            $p = new Pedido();

           if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
                $descricao = addslashes($_POST['descricao']);
                $valor = addslashes($_POST['valor']);
               
             
                $p->edit($idtbpedido, $descricao,$valor);
                header("Location:" . BASE_URL . "/pedido");
            }

           $data['pedido_info'] = $p->getInfo($idtbpedido);
           
            $this->loadTemplate('pedido_edit', $data);
        //} else {
          //  header("Location:" . BASE_URL);
        //}
    }

    public function delete($idtbpedido) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
       // if ($u->hasPermissions('clients_edit')) {
            $p = new Pedido();
            $p->delete($idtbpedido);
            header("Location:" . BASE_URL . "/pedido");
        //} else {
          //  header("Location:" . BASE_URL);
        //}
    }
    
    

}
