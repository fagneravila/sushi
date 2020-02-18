<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Cozinha extends model{
    
    
    private $cozinhaInfo;
   /*   public function __construct(){
      parent::__construct();
      //  $data = array();
        $sql = $this->db->prepare("SELECT tbmesa.idtbmesa,tbmesa.descricao as descmesa, tbpedido.idtbpedido, tbproduto.descricao, (tbproduto.valor * tbpedido.quantidade) AS VALOR , tbstatus.descricao AS STATUSDESCRICAO, tbstatus.idtbstatus 
            FROM tbpedido 
            INNER JOIN tbproduto ON tbproduto.idtbproduto = tbpedido.idtbproduto 
            INNER JOIN tbmesa ON tbmesa.idtbmesa = tbpedido.idtbmesa
            INNER JOIN tbstatus on tbpedido.idtbstatus = tbstatus.idtbstatus WHERE tbpedido.idtbmesa = :idtbmesa AND tbstatus.idtbstatus NOT IN(3,4)
AND tbpedido.data = CURRENT_DATE");
        $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        if($sql->rowCount() > 0){
            $this->pedidoInfo  = $sql->fetch();
        }
        return  $this->pedidoInfo;
    }
    */
   

     
     
     public function getList($offset) {
        $data = array();
        $sql = $this->db->prepare("SELECT tbpedido.idtbmesa,tbpedido.idtbpedido, tbproduto.descricao, tbpedido.quantidade, tbproduto.valor AS VALORUNITARIO,(tbproduto.valor * tbpedido.quantidade) AS VALOR , tbstatus.descricao AS STATUSDESCRICAO, tbstatus.idtbstatus 
         FROM tbpedido INNER JOIN tbproduto ON tbproduto.idtbproduto = tbpedido.idtbproduto 
        INNER JOIN tbstatus on tbpedido.idtbstatus = tbstatus.idtbstatus
        WHERE  tbstatus.idtbstatus = 2 AND tbpedido.data = CURRENT_DATE LIMIT $offset, 10");
       // $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }
        return $data;
    }
    
    
     public function getCount() {
       // $data2 = array();
        $sql = $this->db->prepare("SELECT COUNT(idtbtbstatus) c FROM tbpedido WHERE idtbtbstatus = 2 AND data = CURRENT_DATE");
        $sql->execute();
        $this->cozinhaInfo = $sql->fetch();
        $r = $this->cozinhaInfo;
         return $r;
     
     }
     
     
       public function edit($idtbpedido, $descricao, $valor) {
        $sql = $this->db->prepare("UPDATE tbpedido SET descricao = :descricao, valor = :valor WHERE idtbpedido = :idtbpedido");
        $sql->bindValue(':idtbpedido', $idtbpedido);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->execute();
        }
        
   
    
     public function editStatus($idtbpedido, $idtbstatus) {
        $sql = $this->db->prepare("UPDATE tbpedido SET idtbstatus = :idtbstatus WHERE idtbpedido = :idtbpedido");
        $sql->bindValue(':idtbpedido', $idtbpedido);
        $sql->bindValue(':idtbstatus', $idtbstatus);
      //  $sql->bindValue(":valor", $valor);
        $sql->execute();
        }
    
    
       
}?>