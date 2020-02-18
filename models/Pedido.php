<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Pedido extends model{
    
    
    private $pedidoInfo;
    public function __construct($idtbmesa){
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
    
    public function getStatus() {
         $data =array();
        $sql = $this->db->prepare("SELECT idtbstatus, descricao FROM tbstatus");
      //  $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        if($sql->rowCount() > 0){
        $data  = $sql->fetchAll();
         }
          return $data;
     }
   
    
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
     
      public function getInfoIdtbpedido($idtbpedido) {
       
        $sql = $this->db->prepare("SELECT tbmesa.idtbmesa,tbmesa.descricao as descmesa, tbpedido.idtbpedido, tbproduto.descricao, (tbproduto.valor * tbpedido.quantidade) AS VALOR , tbstatus.descricao AS STATUSDESCRICAO, tbstatus.idtbstatus 
            FROM tbpedido 
            INNER JOIN tbproduto ON tbproduto.idtbproduto = tbpedido.idtbproduto 
            INNER JOIN tbmesa ON tbmesa.idtbmesa = tbpedido.idtbmesa
            INNER JOIN tbstatus on tbpedido.idtbstatus = tbstatus.idtbstatus WHERE tbpedido.idtbpedido = :idtbpedido AND tbstatus.idtbstatus NOT IN(3,4)
AND tbpedido.data = CURRENT_DATE");
        $sql->bindValue(":idtbpedido", $idtbpedido);
        $sql->execute();
        if($sql->rowCount() > 0){
        $this->pedidoInfo  = $sql->fetch();
         }
          return $this->pedidoInfo;
     }
    
     
     
      public function getTotal($idtbmesa) {
       
        $sql = $this->db->prepare("SELECT sum(tbproduto.valor * tbpedido.quantidade) AS VALORTOTAL FROM tbpedido INNER JOIN tbproduto ON tbproduto.idtbproduto = tbpedido.idtbproduto INNER JOIN tbstatus on tbpedido.idtbstatus = tbstatus.idtbstatus WHERE tbpedido.idtbmesa = :idtbmesa AND tbstatus.idtbstatus NOT IN(3,4) AND tbpedido.data = CURRENT_DATE");
        $sql->bindValue(":idtbmesa", $idtbmesa);
         $sql->execute();
        if($sql->rowCount() > 0){
        $this->pedidoInfo  = $sql->fetch();
         }
          return $this->pedidoInfo;
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
     
     
     public function getList($offset,$idtbmesa) {
        $data = array();
        $sql = $this->db->prepare("SELECT tbpedido.idtbpedido, tbproduto.descricao, tbpedido.quantidade, tbproduto.valor AS VALORUNITARIO,(tbproduto.valor * tbpedido.quantidade) AS VALOR , tbstatus.descricao AS STATUSDESCRICAO, tbstatus.idtbstatus 
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
     
      public function caixa() {
        $data = array();
        $sql = $this->db->prepare("SELECT tbcaixa.valor as valor, tbcaixa.data as data, tbtipopagamento.descricao FROM tbcaixa INNER JOIN tbtipopagamento ON tbcaixa.idtbtipopagamento = tbtipopagamento.idtbtipopagamento");
       // $sql->bindValue(":idtbmesa", $idtbmesa);
        $sql->execute();
        $data = $sql->fetch();
        //$r = $data['c'];
     return $data;
     
     }
     public function add($idtbprodudo,$idtbmesa,$quantidade,$idusuario) {
           // $data =  getdate();
            $idtbstatus = 6;
            $sql = $this->db->prepare("INSERT INTO tbpedido SET  "
                    . "idtbproduto = :idtbproduto, idtbmesa =:idtbmesa , quantidade = :quantidade, "
                    . "idtbusuario= :idtbusuario,"
                    . "data = CURRENT_DATE,"
                    . " idtbstatus = :idtbstatus");
            $sql->bindValue(':idtbproduto', $idtbprodudo);
            $sql->bindValue(':idtbmesa', $idtbmesa);
            $sql->bindValue(':quantidade', $quantidade);
            $sql->bindValue(':idtbusuario', $idusuario);
          //  $sql->bindValue(':data', $data);
            $sql->bindValue(':idtbstatus', $idtbstatus);
            $sql->execute();
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
    
     public function editStatus($idtbpedido, $idtbstatus) {
        $sql = $this->db->prepare("UPDATE tbpedido SET idtbstatus = :idtbstatus WHERE idtbpedido = :idtbpedido");
        $sql->bindValue(':idtbpedido', $idtbpedido);
        $sql->bindValue(':idtbstatus', $idtbstatus);
      //  $sql->bindValue(":valor", $valor);
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
     public function addpagamento($idtbtipopagamento,$idtbmesa,$valor) {
           $sql = $this->db->prepare("INSERT INTO tbcaixa SET idtbtipopagamento = :idtbtipopagamento, valor = :valor, data = CURRENT_DATE");
            $sql->bindValue(':idtbtipopagamento', $idtbtipopagamento);
         //   $sql->bindValue(':idtbmesa', $idtbmesa);
            $sql->bindValue(':valor', $valor);
            $sql->execute();
            
            $sql = $this->db->prepare("UPDATE tbpedido SET  "
                    . "idtbstatus = 3 where data = CURRENT_DATE and idtbmesa = :idtbmesa");
            $sql->bindValue(':idtbmesa', $idtbmesa);
            $sql->execute();       
            
       }
       
}
?>