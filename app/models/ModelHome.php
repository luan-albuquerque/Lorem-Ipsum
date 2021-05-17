<?php

namespace App\Models;

use App\models\ClassConexao;
use PDO;

class ModelHome extends ClassConexao
{

private $db;


protected function ListProjetos(){
  $this->db = $this->connectionMysql()->prepare("SELECT * FROM PROJETOS");
  $this->db->execute();
  $I = 0;
  while($Fetch = $this->db->fetch(\PDO::FETCH_ASSOC)){
    $ArrayList[$I] = [
        "COD" => $Fetch['ID_PROJ'],
        "NP" => $Fetch['DESC_PROJ'],
        "DTI" => $Fetch['DT_INICIAL'],
        "DTF" => $Fetch['DT_FIM'],
        "V" => $Fetch['VALOR'],
        "R" => $Fetch['RISCO'],
        "P" => $Fetch['PART']
     ];
  $I++;
  }
   return $ArrayList;

}

protected function ListProjetosEsp($ID){
    $this->db = $this->connectionMysql()->prepare("SELECT * FROM PROJETOS WHERE ID_PROJ=".$ID);
    $this->db->execute();
    while($Fetch = $this->db->fetch(\PDO::FETCH_ASSOC)){
      $ArrayList = [
          "COD" => $Fetch['ID_PROJ'],
          "NP" => $Fetch['DESC_PROJ'],
          "DTI" => $Fetch['DT_INICIAL'],
          "DTF" => $Fetch['DT_FIM'],
          "V" => $Fetch['VALOR'],
          "R" => $Fetch['RISCO'],
          "P" => $Fetch['PART']
       ];
    
    }
     return $ArrayList;
  
  }

}