<?php

namespace App\Models;

use App\models\ClassConexao;
use PDO;

class ModelHome extends ClassConexao
{

    private $db;
   protected function CadastrarProjeto($DESC, $DTI, $DTF, $VALOR, $RISCO, $PART){
    
    $this->db = $this->connectionMysql()->prepare("INSERT INTO PROJETOS VALUES(null,:NP,:DTI,:DTF,'$VALOR','$RISCO',:PART)");
    $this->db->bindParam(":NP", $DESC, \PDO::PARAM_STR);
    $this->db->bindParam(":DTI", $DTI, \PDO::PARAM_STR);
    $this->db->bindParam(":DTF", $DTF, \PDO::PARAM_STR);  
    $this->db->bindParam(":PART", $PART, \PDO::PARAM_STR);  
    $this->db->execute();
    echo "<script>alert('Cadastrado com Sucesso!')</script>";
   
}

    protected function ListProjetos()
    {
        $this->db = $this->connectionMysql()->prepare("SELECT * FROM PROJETOS");
        $this->db->execute();
        $I = 0;
        while ($Fetch = $this->db->fetch(\PDO::FETCH_ASSOC)) {
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

    protected function ListProjetosEsp($ID)
    {
        $this->db = $this->connectionMysql()->prepare("SELECT * FROM PROJETOS WHERE ID_PROJ=" . $ID);
        $this->db->execute();
        while ($Fetch = $this->db->fetch(\PDO::FETCH_ASSOC)) {
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


    protected function DeletarProjetos($ID)
    {
        $this->db = $this->connectionMysql()->prepare("DELETE FROM PROJETOS WHERE ID_PROJ=:ID");
        $this->db->bindParam(":ID", $ID, \PDO::PARAM_INT);
        $this->db->execute();
    }

    protected function UpdateProjeto($ID, $DESC, $DTI, $DTF, $VALOR, $RISCO, $PART)
    {

        if ($ID != null) {
            $this->db = $this->connectionMysql()
        ->prepare("UPDATE  PROJETOS SET DESC_PROJ='$DESC',DT_INICIAL='$DTI', DT_FIM='$DTF',  VALOR=$VALOR, RISCO=$RISCO, PART='$PART'  WHERE ID_PROJ=$ID;");
            $this->db->execute();
        } else {
            echo "<script>alert('Campos Vazios $ID')</script>";
        }


    }
}
