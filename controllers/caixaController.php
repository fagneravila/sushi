<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mesaController
 *
 * @author fagne
 */
class mesaController extends controller {
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
             
            $data['mesa_list'] = $mesa->getList($offset);
            $data['mesa_count'] = $mesa->getCount();
            $data['m_count']= ceil($data['mesa_count']/5);
           // $data['edit_edit'] ;//= $u->hasPermissions('inventory_edit');
            $this->loadTemplate('mesa', $data);
       
    }
    
    
    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
      //  if ($u->hasPermissions('clients_edit')) {
            $m = new Mesa();

            if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
                $descricao = addslashes($_POST['descricao']);
                $idtbsituacaomesa = addslashes($_POST['idtbsituacaomesa']);
                $m->add($descricao, $idtbsituacaomesa);
              
                header("Location:" . BASE_URL . "/mesa");
            }
             $data['mesa_list'] = $m->getListSituacao();
             $this->loadTemplate('mesa_add', $data);
     //   } else {
            
       //     header("Location:" . BASE_URL . "/clients");
       // }
    }
    
    
     public function edit($idtbmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
      //  if ($u->hasPermissions('clients_edit')) {
            $m = new Mesa();

           if (isset($_POST['descricao']) && !empty($_POST['descricao'])) {
                $descricao = addslashes($_POST['descricao']);
                $idtbsituacaomesa = addslashes($_POST['idtbsituacaomesa']);
               
             
                $m->edit($idtbmesa, $descricao,$idtbsituacaomesa);
                header("Location:" . BASE_URL . "/mesa");
            }

           $data['mesa_info'] = $m->getInfo($idtbmesa);
           $data['mesa_list'] = $m->getListSituacao();
            $this->loadTemplate('mesa_edit', $data);
        //} else {
          //  header("Location:" . BASE_URL);
        //}
    }

    public function delete($idtbmesa) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
       // if ($u->hasPermissions('clients_edit')) {
            $p = new Mesa();
            $p->delete($idtbmesa);
            header("Location:" . BASE_URL . "/mesa");
        //} else {
          //  header("Location:" . BASE_URL);
        //}
    }
    
    

}
