<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Produto extends model{
    
    
    private $produtoInfo;
   /* public function __construct($idtbproduto){
        parent::__construct();
        $sql = $this->db->prepare("SELECT * FROM tbproduto WHERE idtbproduto = :idtbproduto");
        $sql->bindValue(":idtbproduto", $idtbproduto);
        $sql->execute();
        if($sql->rowCount() > 0){
        $this->´prdutoInfo  = $sql->fetch();
        }
    }*/
    
     public function getInfo($idtbproduto) {
        $sql = $this->db->prepare("SELECT * FROM tbproduto WHERE idtbproduto = :idtbproduto");
        $sql->bindValue(":idtbproduto", $idtbproduto);
        $sql->execute();
        if($sql->rowCount() > 0){
        $this->produtoInfo  = $sql->fetch();
         }
          return $this->produtoInfo;
     }
    
     public function getList($offset) {
        $data = array();
        $sql = $this->db->prepare("SELECT * FROM tbproduto LIMIT $offset, 10");
    //    $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }
        return $data;
    }
     
     public function getCount() {
        $data = array();
        $sql = $this->db->prepare("SELECT COUNT(*) c FROM tbproduto");
        //$sql->bindValue(":id_company", $id_company);
        $sql->execute();
        $data = $sql->fetch();
        $r = $data['c'];
        return $r;
    }
   
    
     public function add($descricao,$valor) {
        $sql = $this->db->prepare("SELECT COUNT(*) AS c FROM tbproduto WHERE  descricao = :descricao");
        $sql->bindValue(':descricao',$descricao);
        $sql->bindValue(':valor', $valor);
        $sql->execute();
        $row = $sql->fetch();
        if ($row['c'] == 0) {
            $sql = $this->db->prepare("INSERT INTO tbproduto SET descricao = :descricao, valor =:valor");
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':valor', $valor);
            $sql->execute();
            return '1';
        } else {
            return '0';
        }
    }
       public function edit($idtbproduto, $descricao, $valor) {
        $sql = $this->db->prepare("UPDATE tbproduto SET descricao = :descricao, valor = :valor WHERE idtbproduto = :idtbproduto");
        $sql->bindValue(':idtbproduto', $idtbproduto);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->execute();
        }
        
     public function delete($idtbproduto) {
        $sql = $this->db->prepare("DELETE FROM tbproduto WHERE idtbproduto = :idtbproduto");
        $sql->bindValue(':idtbproduto', $idtbproduto);
        $sql->execute();
        
    }
    
     public function searchProdutoDesc($descricao){
        $array = array();
        $sql = $this->db->prepare("SELECT descricao, idtbproduto FROM tbproduto WHERE descricao LIKE :descricao LIMIT 20");
               
        $sql->bindValue(':descricao','%'.$descricao.'%');
        //$sql->bindValue(":id_company", $id_company);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
}
?>