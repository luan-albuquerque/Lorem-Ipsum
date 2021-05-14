<?php

namespace App\Controllers;

use Src\Classes\ClassRender;

class ControllerHome 
{

    public function __construct()
    {
        $Render = new ClassRender;
        $Render->setDir("home");
        $Render->setTitle("Pagina Inicial");
        $Render->setDescription("Pagina de Inicio");
        $Render->setKeyWords("PgInicial");
        $Render->renderLayout();
    
       
    }
    private function recValores()
    {
        # RECOLHENDO MEUS VALORES DOS MEUS INPUT
      
    }


    # METODOS OCULTOS E FUNÇÕES CRUD
   
}
