<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Mesa extends model{
    
    
    private $mesaInfo;
   /* public function __construct($idtbmesa){
        parent::__construct();
        $sql = $this->db->prepare("SELECT * FROM tbmesa WHERE idtbmesa = :idtbmesa");
        $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        if($sql->rowCount() > 0){
        $this->´prdutoInfo  = $sql->fetch();
        }
    }*/
    
     public function getInfo($idtbmesa) {
        $sql = $this->db->prepare("SELECT * FROM tbmesa WHERE idtbmesa = :idtbmesa");
        $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        if($sql->rowCount() > 0){
        $this->mesaInfo  = $sql->fetch();
         }
          return $this->mesaInfo;
     }
    
     public function getList($offset) {
        $data = array();
        $sql = $this->db->prepare("SELECT tbmesa.idtbmesa idtbmesa, tbmesa.descricao descricao, "
                . "tbsituacaomesa.idtbsituacaomesa idtbsituacaomesa, tbsituacaomesa.descricao AS status "
                . "FROM tbmesa INNER JOIN tbsituacaomesa ON tbsituacaomesa.idtbsituacaomesa = tbmesa.idtbsituacaomesa  LIMIT $offset, 10");
    //    $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }
        return $data;
    }

    public function getListSituacao() {
        $data = array();
        $sql = $this->db->prepare("SELECT * FROM tbsituacaomesa");
    //    $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }
        return $data;
    }
    
     public function getCount() {
        $data = array();
        $sql = $this->db->prepare("SELECT COUNT(*) c FROM tbmesa");
        //$sql->bindValue(":id_company", $id_company);
        $sql->execute();
        $data = $sql->fetch();
        $r = $data['c'];
        return $r;
    }
   
    
     public function add($descricao,$idtbsituacaomesa) {
        $sql = $this->db->prepare("SELECT COUNT(*) AS c FROM tbmesa WHERE descricao = :descricao");
        $sql->bindValue(':descricao',$descricao);
       // $sql->bindValue(':idtbsituacaomesa',$idtbsituacaomesa);
        $sql->execute();
        $row = $sql->fetch();
        if ($row['c'] == 0) {
            $sql = $this->db->prepare("INSERT INTO tbmesa SET descricao = :descricao, idtbsituacaomesa =:idtbsituacaomesa");
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':idtbsituacaomesa', $idtbsituacaomesa);
            $sql->execute();
            return '1';
        } else {
            return '0';
        }
    }
       public function edit($idtbmesa, $descricao, $idtbsituacaomesa) {
        $sql = $this->db->prepare("UPDATE tbmesa SET descricao = :descricao, idtbsituacaomesa = :idtbsituacaomesa WHERE idtbmesa = :idtbmesa");
        $sql->bindValue(':idtbmesa', $idtbmesa);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(":idtbsituacaomesa", $idtbsituacaomesa);
        $sql->execute();
        }
        
     public function delete($idtbmesa) {
        $sql = $this->db->prepare("DELETE FROM tbmesa WHERE idtbmesa = :idtbmesa");
        $sql->bindValue(':idtbmesa', $idtbmesa);
        $sql->execute();
        
    }
    
     public function searchmesaDesc($descricao){
        $array = array();
        $sql = $this->db->prepare("SELECT descricao, idtbmesa FROM tbmesa WHERE descricao LIKE :descricao LIMIT 20");
               
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