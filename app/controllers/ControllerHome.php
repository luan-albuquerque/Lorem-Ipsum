<?php

namespace App\Controllers;

use Src\Classes\ClassRender;

class ControllerHome 
{
 private $nomeP,$dtinicial,$dtfinal,$participantes,$valorP,$risco;
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

if(isset($_POST['nprojeto'])){$this->nomeP = filter_input(INPUT_POST,'nprojeto',FILTER_SANITIZE_SPECIAL_CHARS); }
if(isset($_POST['ndtinicio'])){$this->dtinicial = filter_input(INPUT_POST,'ndtinicio',FILTER_SANITIZE_SPECIAL_CHARS); }
if(isset($_POST['ndtfim'])){$this->dtfinal = filter_input(INPUT_POST, 'ndtfim', FILTER_SANITIZE_SPECIAL_CHARS); }
if(isset($_POST['nvalor'])){$this->valorP = filter_input(INPUT_POST, 'nvalor', FILTER_SANITIZE_SPECIAL_CHARS); }
if(isset($_POST['nrisco'])){$this->risco = filter_input(INPUT_POST, 'nrisco', FILTER_SANITIZE_SPECIAL_CHARS); }
if(isset($_POST['name'])){$this->participantes = $_POST['name']; }
     
    }


    # METODOS OCULTOS E FUNÇÕES CRUD



    public function Lista_de_Projetos(){
       
        echo "
        <form id='formexcluir' method='POST' action='".DIRPAGE."home/Deletar-Perfume'>
        <table cellspacing='0' cellpadding='4' border='0' style='color:#333333;width:100%;border-collapse:collapse;'>
	
        <!--DEF DE COLUNAS -->
         	<tr style='color:White;background-color:#71C39A;font-weight:bold;'>
			<th scope='col'>ID</th>
            <th scope='col'>Nome do Projeto</th>
            <th scope='col'>Registro Inicial</th>
            <th scope='col'>Registro Final</th>
            <th scope='col'>Valor</th> 
            <th scope='col'>Risco</th>
            <th></th> 
            <th></th>
            <th></th>
            <th></th>
            </tr>

        <!--FIM DEF DE COLUNAS-->
        <!-- TR DE VALORES ACRESCENTA -->
    ";

       // foreach ($result as $dados) {
     //
       //     $dataC = new DateTime();
       //     $dt = $dataC->format('d/m/Y');
            echo "
        <tr align='center' style='background-color:#E3EAEB;'>
			
            <td><STRONG>Teste</STRONG></td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>
            <td>Teste</td>

            <td> <input type='hidden' id='Teste' name=''>
            <label class='btn-action glyphicons btn-info play_button' id='l1' for='Teste'>
            <a title='Simular Investimento'> 
            <i></i></a></label> </td>

            <td> <input type='hidden' id='Teste' name=''>
            <label class='btn-action glyphicons btn-info group' id='l1' for='Teste'>
            <a title='Participantes'> 
            <i></i></a></label> </td>

            <td>
            
            <input class='offCheckbox' type='checkbox' id='Teste' name='id_cod[]' value='Teste'>
            <label class='btn-action glyphicons asel bin' id='l1' for='Teste'>
            <a title='Excluir'> 
            <i></i></a></label> </td>

            <td><a title='Editar' href='" . DIRPAGE . "home/Formulario-Update/Teste' target='blank'  class='btn-action glyphicons pencil btn-info'><i></i></a></td>
           
	       </tr>

            ";
        //}
        echo "
        <!--FIM DO TR DE ADIÇÃO-->
	       </table>
          <hr>
           <input n class='redirect btn btn-primary' value='Excluir' for='formexcluir' type='submit'>
           </form>";
    }


    }
   
