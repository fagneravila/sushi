<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class loginController extends controller {

    public function index() {
        $data = array();
        if (isset($_POST["usuario"]) && !empty($_POST["usuario"])) {
            $usuario = addslashes($_POST["usuario"]);
            $senha = addslashes($_POST["senha"]);

            $u = new Users();
            if ($u->doLogin($usuario, $senha)) {
                header("Location: " .BASE_URL);
                exit;
            } else {
                $data["error"] = "E-mail e/ou Senha errados..";
            }
        }
        $this->loadView("login", $data);
    }

    public function logout() {
        $u = new Users();
        $u->logout();
        header("Location:" . BASE_URL);
    }

}
