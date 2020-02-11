<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class pedido extends model{
    
    
    private $pedidoInfo;
   /* public function __construct($idtbmesa){
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
    }*/
    
     public function getInfo($idtbmesa) {
       
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
          return $this->pedidoInfo;
     }
    
     public function getList($offset,$idtbmesa) {
        $data = array();
        $sql = $this->db->prepare("SELECT tbpedido.idtbpedido, tbproduto.descricao, tbpedido.quantidade,(tbproduto.valor * tbpedido.quantidade) AS VALOR , tbstatus.descricao AS STATUSDESCRICAO, tbstatus.idtbstatus 
         FROM tbpedido INNER JOIN tbproduto ON tbproduto.idtbproduto = tbpedido.idtbproduto 
        INNER JOIN tbstatus on tbpedido.idtbstatus = tbstatus.idtbstatus
        WHERE tbpedido.idtbmesa = :idtbmesa AND tbstatus.idtbstatus NOT IN(3,4)
AND tbpedido.data = CURRENT_DATE LIMIT $offset, 10");
        $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
        }
        return $data;
    }
     
     public function getCount($idtbmesa) {
        $data = array();
        $sql = $this->db->prepare("SELECT COUNT(*) c FROM tbpedido WHERE idtbmesa = :idtbmesa AND data = CURRENT_DATE");
        $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        $data = $sql->fetch();
        $r = $data['c'];
        return $r;
}
     public function add($descricao,$valor) {
        $sql = $this->db->prepare("SELECT COUNT(*) AS c FROM tbpedido WHERE  descricao = :descricao");
        $sql->bindValue(':descricao',$descricao);
        $sql->bindValue(':valor', $valor);
        $sql->execute();
        $row = $sql->fetch();
        if ($row['c'] == 0) {
            $sql = $this->db->prepare("INSERT INTO tbpedido SET descricao = :descricao, valor =:valor");
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':valor', $valor);
            $sql->execute();
            return '1';
        } else {
            return '0';
        }
    }
       public function edit($idtbpedido, $descricao, $valor) {
        $sql = $this->db->prepare("UPDATE tbpedido SET descricao = :descricao, valor = :valor WHERE idtbpedido = :idtbpedido");
        $sql->bindValue(':idtbpedido', $idtbpedido);
        $sql->bindValue(':descricao', $descricao);
        $sql->bindValue(":valor", $valor);
        $sql->execute();
        }
        
     public function delete($idtbpedido) {
        $sql = $this->db->prepare("DELETE FROM tbpedido WHERE idtbpedido = :idtbpedido");
        $sql->bindValue(':idtbpedido', $idtbpedido);
        $sql->execute();
        
    }
    
     public function searchPedidoDesc($descricao){
        $array = array();
        $sql = $this->db->prepare("SELECT descricao, idtbpedido FROM tbpedido WHERE descricao LIKE :descricao LIMIT 20");
               
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