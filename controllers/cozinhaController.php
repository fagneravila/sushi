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
class cozinhaController extends controller {
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

       
            $coz = new Cozinha();
            $offset = 0;
            $data["p"]=1;
             if (isset($_GET['p']) && !empty($_GET['p'])){
                 $data["p"]= intval($_GET['p']);
                 if($data['p']==0){
                     $data["p"]=1;
                 }
             }
             $offset = (10 *($data["p"]-1));
             
            $data['cozinha_list'] = $coz->getList($offset);
            $data['cozinha_count'] = $coz->getCount();
            $data['c_count']= ceil($data['cozinha_count']/5);
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('cozinha', $data);
       
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


    

}