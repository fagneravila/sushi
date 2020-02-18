<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Caixa extends model{
    
    
    private $caixainfo;
  
    
   /* public function __construct($idtbmesa){
        parent::__construct();
        $sql = $this->db->prepare("SELECT * FROM tbmesa WHERE idtbmesa = :idtbmesa");
        $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        if($sql->rowCount() > 0){
        $this->´prdutoInfo  = $sql->fetch();
        }
    }*/
    
     
    
     public function getList($offset) {
        $data = array();
        $sql = $this->db->prepare("SELECT tbcaixa.valor, tbtipopagamento.descricao, DATE_FORMAT(tbcaixa.data, '%d/%m/%Y') as DATA FROM tbcaixa INNER JOIN tbtipopagamento ON tbtipopagamento.idtbtipopagamento = tbcaixa.idtbtipopagamento LIMIT $offset, 10");
    //    $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }
        return $data;
    }

    
    
     public function getCount() {
        $data = array();
        $sql = $this->db->prepare("SELECT COUNT(*) c FROM tbcaixa");
        //$sql->bindValue(":id_company", $id_company);
        $sql->execute();
        $data = $sql->fetch();
        $r = $data['c'];
        return $r;
    }
   
    
     public function addpagamento($idtbtipopagamento,$idtbmesa,$valor) {
           $sql = $this->db->prepare("INSERT INTO tbcaixa SET idtbtipopagamento = :idtbtipopagamento, valor = :valor, data = CURRENT_DATE");
            $sql->bindValue(':idtbtipopagamento', $idtbtipopagamento);
         //   $sql->bindValue(':idtbmesa', $idtbmesa);
            $sql->bindValue(':valor', $valor);
            $sql->execute();  
            
       }
       
        public function getTipoPagamento() {
       $data = array();
        $sql = $this->db->prepare("SELECT * FROM tbtipopagamento");
      //  $sql->bindValue(":idtbmesa", $idtbmesa);
         $sql->execute();
        if($sql->rowCount() > 0){
        $data  = $sql->fetchAll();
         }
          return $data;
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