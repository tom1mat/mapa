<?php

require "DBconnection.php";
class Marcadores
{
    public $db;

    function __construct()
    {
        //"localhost", "gruporod_grupo_rodriguez","gruporod_global","Gruporodriguez123"
        DBconnection::setData("localhost", "gruporod_grupo_rodriguez","root","");
        $this->db = DBconnection::getConnection();
    }

    public function getMarcadores($id=null){
        $marcadores = array();
        if($id == null){
            $query = "Select * from marcador";
            $instanciabase = $this->db->prepare($query);
            $instanciabase->execute();

            while($marcador =$instanciabase->fetch()){
                array_push($marcadores,$marcador);
            }
            return $marcadores;
        }else if(intval($id)){
            $query = "Select * from marcador where id=?";
            $instanciabase = $this->db->prepare($query);
            $instanciabase->bindValue(1, $id);
            $instanciabase->execute();

            if($instanciabase->rowCount() == 0)
              return false;

            while($marcador =$instanciabase->fetch()){
                return $marcador;
            }
            return false;
        }
    }
    public function updateMarcador($campos, $id){
      $set = '';
      $x = 1;

      foreach($campos as $nombre => $valor) {
          $set .= "{$nombre} = \"{$valor}\"";
          if($x < count($campos)) {
              $set .= ',';
          }
          $x++;
      }

      $query = "UPDATE marcador SET {$set} WHERE id = {$id};";

      $instanciabase = $this->db->prepare($query);
      $instanciabase->execute();

      return $instanciabase->rowCount();
      if($instanciabase->rowCount() > 0)
        return true;
      else
        return false;
    }

    public function insertMarcador($campos){
      $fields = '(';
      $values = '(';
      $x = 1;

      foreach($campos as $nombre => $valor) {
        $fields .= "{$nombre}";
        $values .= "\"{$valor}\"";
        if($x < count($campos)) {
          $fields .= ",";
          $values .= ",";
        }else{
          $fields .= ')';
          $values .= ')';
        }
        $x++;
      }
      $query = "insert into marcador {$fields} values {$values};";

      $instanciabase = $this->db->prepare($query);
      $instanciabase->execute();

      if($instanciabase->rowCount() > 0)
        return true;
      else
        return false;
    }

    public function deleteMarcador($id_marcador){
      $query = 'delete from marcador where id='.$id_marcador.';';
      $instanciabase = $this->db->prepare($query);
      $instanciabase->execute();

      if($instanciabase->rowCount() > 0)
        return true;
      else
        return false;
    }
}
