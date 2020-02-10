<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usersController
 *
 * @author adminti
 */
class usersController extends controller {

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


      //  if ($u->hasPermissions('users_view')) {
           $data['user_list'] = $u->getList($u->getFuncao());
            $this->loadTemplate('users', $data);
        //} else {
          //  header("Location:" . BASE_URL);
       // }
    }

    public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $funcao = new Funcao($u->getFuncao());
        $data['usuarioFuncao'] = $funcao->getDescricao();
        $data['usuarioNome'] = $u->getNome();
       // if ($u->hasPermissions('users_view')) {
           // $f = new Funcao();
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = addslashes($_POST['email']);
                $password = addslashes($_POST['password']);
                $group = addslashes($_POST['group']);
                $a = $u->add($email, $password, $group, $u->getCompany());
                if ($a == '1') {
                    header("Location:" . BASE_URL . "/users");
                } else {
                    $data['error_msg'] = 'Usuário ja existe';
                }
            }

            $data['funcao_list'] = $u->getFuncaoList();
            $this->loadTemplate('users_add', $data);
       // } else {
         //   header("Location:" . BASE_URL);
        //}
    }

    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();
        if ($u->hasPermissions('users_view')) {
            $p = new Permissions();

            if (isset($_POST['group']) && !empty($_POST['group'])) {
                $password = addslashes($_POST['password']);
                $group = addslashes($_POST['group']);
                $u->edit($id, $password, $group, $u->getCompany());
                header("Location:" . BASE_URL . "/users");
            }

            $data['user_info'] = $u->getInfo($id, $u->getCompany());
            $data['group_list'] = $p->getGroupList($u->getCompany());
            $this->loadTemplate('users_edit', $data);
        } else {
            header("Location:" . BASE_URL);
        }
    }
    
    public function delete($id){
         $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();
        if ($u->hasPermissions('users_view')) {
            $p = new Permissions();
            $u->delete($id, $u->getCompany());
            header("Location:" . BASE_URL."/users");
        } else {
            header("Location:" . BASE_URL);
        }
    }

}
