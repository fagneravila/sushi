<?php

class Users extends model {

    private $userInfo;
    private $permissions;

    public function isLogged() {

        if (isset($_SESSION["ccUser"]) && !empty($_SESSION["ccUser"])) {
            return true;
        } else {
            return false;
        }
    }

    public function doLogin($usuario, $senha) {
        $sql = $this->db->prepare("SELECT * FROM tbusuario WHERE usuario = :usuario AND senha = :senha");
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['ccUser'] = $row['idtbusuario'];
            return true;
        } else {
            return false;
        }
    }

    public function setLoggedUser() {
        if (isset($_SESSION["ccUser"]) && !empty($_SESSION["ccUser"])) {
            $idtbusuario = $_SESSION["ccUser"];

            $sql = $this->db->prepare("SELECT tbpessoa.nome, tbfuncao.idtbfuncao FROM tbusuario INNER JOIN tbpessoa ON tbusuario.idtbpessoa = tbpessoa.idtbpessoa INNER JOIN tbfuncao on tbfuncao.idtbpessoa = tbpessoa.idtbpessoa WHERE tbusuario.idtbusuario = :idtbusuario");
            $sql->bindValue(":idtbusuario", $idtbusuario);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $this->userInfo = $sql->fetch();
            //    $this->permissions = new Permissions();
             //   $this->permissions->setGroup($this->userInfo['id_group'], $this->userInfo['id_company']);
            }
        }
    }

    public function getFuncao() {
        if (isset($this->userInfo['idtbfuncao'])) {
            return $this->userInfo['idtbfuncao'];
        } else {
            return 0;
        }
    }

    public function getNome() {
        if (isset($this->userInfo['nome'])) {
            return $this->userInfo['nome'];
        } else {
            return '';
        }
    }

    public function getInfo($id, $idtbfuncao) {
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM tbusuario WHERE idtbusuario = :id AND idtbfuncao = :idtbfuncao");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":idtbfuncao", $idtbfuncao);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function getList($idtbfuncao) {
        $data = array();
        $sql = $this->db->prepare("SELECT tbpessoa.nome, tbusuario.usuario, tbfuncao.descricao FROM tbusuario INNER JOIN tbpessoa ON tbusuario.idtbpessoa = tbpessoa.idtbpessoa INNER JOIN tbfuncao ON tbfuncao.idtbpessoa = tbpessoa.idtbpessoa WHERE tbfuncao.idtbfuncao = :idtbfuncao");
        $sql->bindValue(":idtbfuncao", $idtbfuncao);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }
        return $data;
    }

    public function logout() {
        unset($_SESSION["ccUser"]);
    }

    
    public function getFuncaoList() {
        $data = array();
        $sql = $this->db->prepare("SELECT * FROM tbfuncao");
     //   $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }
        return $data;
    }    
    
    
    public function hasPermissions($name) {
        return $this->permissions->hasPermissions($name);
    }

    public function findUsersInGroup($id) {
        $sql = $this->db->prepare("SELECT COUNT(*) AS c FROM users WHERE id_group = :id_group");
        $sql->bindValue(":id_group", $id);
        $sql->execute();
        $row = $sql->fetch();
        if ($row['c'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function add($nome,$cpf, $senha, $usuario, $idfuncao) {
        $sql = $this->db->prepare("SELECT COUNT(*) AS c FROM tbpessoa WHERE  usuario = :usuario");
        $sql->bindValue(':usuario', $usuario);
        $sql->execute();
        $row = $sql->fetch();
        if ($row['c'] == 0) {
            $sql = $this->db->prepare("INSERT INTO users SET email = :email, password =:password, id_group = :id_group, id_company = :id_company");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':password', md5($password));
            $sql->bindValue(':id_group', $group);
            $sql->bindValue(":id_company", $id_company);
            $sql->execute();
            return '1';
        } else {
            return '0';
        }
    }

    public function edit($id, $password, $group, $id_company) {
        $sql = $this->db->prepare("UPDATE users SET id_group = :id_group WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(':id_group', $group);
        $sql->bindValue(':id', $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        if (!empty($password)) {
            $sql = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id AND id_company = :id_company");
            $sql->bindValue(':password', md5($password));
            $sql->bindValue(':id', $id);
            $sql->bindValue(":id_company", $id_company);
            $sql->execute();
        }
    }
    
     public function delete($id, $id_company) {
        $sql = $this->db->prepare("DELETE FROM users WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(':id', $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        
    }

}

?>