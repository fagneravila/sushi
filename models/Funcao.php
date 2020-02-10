<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Funcao extends model{
    private $funcaoInfo;
    public function __construct($idtbfuncao){
        parent::__construct();
        $sql = $this->db->prepare("SELECT * FROM tbfuncao WHERE idtbfuncao = :idtbfuncao");
        $sql->bindValue(":idtbfuncao", $idtbfuncao);
        $sql->execute();
        if($sql->rowCount() > 0){
        $this->funcaoInfo  = $sql->fetch();
        }
    }
    
    public function getDescricao() {
        if(isset($this->funcaoInfo['descricao'])){
            return $this->funcaoInfo['descricao'];   
        }else{
            return '';
        }        
    }
}