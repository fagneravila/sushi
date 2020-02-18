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
            $mesa = new Mesa();
            $offset = 0;
            $data["p"]=1;
             if (isset($_GET['p']) && !empty($_GET['p'])){
                 $data["p"]= intval($_GET['p']);
                 if($data['p']==0){
                     $data["p"]=1;
                 }
             }
             $offset = (10 *($data["p"]-1));
            $data['mesainfo'] = $mesa->getInfo($idtbmesa) ;
            $data['pedido_list'] = $prod->getList($offset,$idtbmesa);
            $data['pedido_count'] = $prod->getCount($idtbmesa);
            $data['p_count']= ceil($data['pedido_count']/5);
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('pedido', $data);
       
    }
    
    
      public function fecharConta($idtbmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
          $prod = new Pedido($idtbmesa);
            $mesa = new Mesa();
       
         if (isset($_POST['idtbtipopagamento']) && !empty($_POST['idtbtipopagamento'])) {
<<<<<<< HEAD
<<<<<<< HEAD
                $idtbtipopagamento = addslashes($_POST['idtbtipopagamento']);
=======
                $idtbpagamento = addslashes($_POST['idtbtipopagamento']);
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
=======
                $idtbpagamento = addslashes($_POST['idtbtipopagamento']);
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
                $idtbmesa = addslashes($_POST['idtbmesa']);
                $valor = addslashes($_POST['valor']);
               // $idtbusuario = $data['idtbusuario'];
                  $prod->addpagamento(
                        $idtbtipopagamento, 
                        $idtbmesa,
                        $valor
                      );
                  
<<<<<<< HEAD
<<<<<<< HEAD
                  
              
                header("Location:" . BASE_URL . "/mesa");
=======
              
                header("Location:" . BASE_URL . "/caixa");
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
=======
              
                header("Location:" . BASE_URL . "/caixa");
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
            }
        
                
           
            $offset = 0;
            $data["p"]=1;
             if (isset($_GET['p']) && !empty($_GET['p'])){
                 $data["p"]= intval($_GET['p']);
                 if($data['p']==0){
                     $data["p"]=1;
                 }
             }
             $offset = (10 *($data["p"]-1));
            $data['mesainfo'] = $mesa->getInfo($idtbmesa) ;
            $data['pedido_list'] = $prod->getList($offset,$idtbmesa);
            $data['pedido_count'] = $prod->getCount($idtbmesa);
            $data['pag'] = $prod->getTipoPagamento();
            $data['p_count']= ceil($data['pedido_count']/5);
            $data['conta'] = $prod->getTotal($idtbmesa);
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('fecharConta', $data);
       
    }
     public function preadd($idtbmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();

            $ped = new Pedido($idtbmesa);
            $prod = new Produto();
            $mesa = new Mesa();
            $offset = 0;
            $data["p"]=1;
             if (isset($_GET['p']) && !empty($_GET['p'])){
                 $data["p"]= intval($_GET['p']);
                 if($data['p']==0){
                     $data["p"]=1;
                 }
             }
             $offset = (10 *($data["p"]-1));
            $data['mesainfo'] = $mesa->getInfo($idtbmesa) ;
            $data['produto_list'] = $prod->getList($offset);
            $data['produto_count'] = $prod->getCount();
            $data['p_count']= ceil($data['produto_count']/5);
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('pedido_preadd', $data);
            
            
            
            
            
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
    
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
    
     public function escolherPedido($idtbproduto,$idtbmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();

           // $ped = new Pedido($idtbmesa);
            $prod = new Produto();
            $mesa = new Mesa();
            $data['mesainfo'] = $mesa->getInfo($idtbmesa) ;
            $data['produto_info'] = $prod->getInfo($idtbproduto);
          //  $pedido_info = $idtbpedido;
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('pedido_add', $data);     
            
            
            
    }
=======
    
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
    
     public function escolherPedido($idtbproduto,$idtbmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();

           // $ped = new Pedido($idtbmesa);
            $prod = new Produto();
            $mesa = new Mesa();
            $data['mesainfo'] = $mesa->getInfo($idtbmesa) ;
            $data['produto_info'] = $prod->getInfo($idtbproduto);
          //  $pedido_info = $idtbpedido;
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('pedido_add', $data);     
            
            
            
    }
    
    
    
    
<<<<<<< HEAD
    
<<<<<<< HEAD
=======
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
=======
>>>>>>> 76631a4222b825cc15110aaa46cb918d4093a5e3
    public function add($idproduto,$idmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
        $data['idtbusuario'] = $u->getIdusuario();
      //  if ($u->hasPermissions('clients_edit')) {
            $p = new pedido($idmesa);
            $prod = new Produto();
            $mesa = new Mesa();
            $data['mesainfo'] = $mesa->getInfo($idmesa) ;
            $data['produto_info'] = $prod->getInfo($idproduto);
            if (isset($_POST['idtbproduto']) && !empty($_POST['idtbproduto'])) {
                $idtbproduto = addslashes($_POST['idtbproduto']);
                $idtbmesa = addslashes($_POST['idtbmesa']);
                $quantidade = addslashes($_POST['quantidade']);
                $idtbusuario = $data['idtbusuario'];
                  $p->add(
                        $idtbproduto, 
                        $idtbmesa,
                        $quantidade,
                        $idtbusuario
                      );
              
                header("Location:" . BASE_URL . "/pedido/view/$idtbmesa");
            }

            $this->loadTemplate('pedido_add', $data);
     //   } else {
            
       //     header("Location:" . BASE_URL . "/clients");
       // }
    }
    
    
     public function edit($idtbpedido,$idtbmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
      //  if ($u->hasPermissions('clients_edit')) {
            $p = new Pedido($idtbmesa);
                      
            

           if (isset($_POST['idtbpedido']) && !empty($_POST['idtbpedido'])) {
                $idtbstatus = addslashes($_POST['idtbstatus']);
                $idpedido = addslashes($_POST['idtbpedido']);
                $idmesa = addslashes($_POST['idtbmesa']);
                
             
                $p->editStatus($idtbpedido, $idtbstatus);
                header("Location:" . BASE_URL ."/pedido/view/".$idmesa);
            }
           $data['status'] = $p->getStatus();
           $data['pedido_info'] = $p->getInfoIdtbpedido($idtbpedido);
           
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
