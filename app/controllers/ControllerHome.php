<?php

namespace App\Controllers;

use App\models\ModelHome;
use DateTime;
use Src\Classes\ClassRender;

class ControllerHome extends ModelHome
{

    private $nomeP, $dtinicial, $dtfinal, $participantes, $valorP, $risco, $Array, $codDel, $ID;
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
        if (isset($_POST['idcod'])) {
            $this->ID = filter_input(INPUT_POST, 'idcod', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['nprojeto'])) {
            $this->nomeP = filter_input(INPUT_POST, 'nprojeto', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['ndtinicio'])) {
            $this->dtinicial = filter_input(INPUT_POST, 'ndtinicio', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['ndtfim'])) {
            $this->dtfinal = filter_input(INPUT_POST, 'ndtfim', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['nvalor'])) {
            $this->valorP = filter_input(INPUT_POST, 'nvalor', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['nrisco'])) {
            $this->risco = filter_input(INPUT_POST, 'nrisco', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['name'])) {
            $this->participantes = $_POST['name'];
        }
        if (isset($_POST['id_cod'])) {
            $this->codDel = $_POST['id_cod'];
        }
    }



    # METODOS OCULTOS E FUNÇÕES CRUD

    public function Excluir()
    {

        $this->recValores();
        foreach ($this->codDel as $dadosdel) {
            $this->DeletarProjetos($dadosdel);
        }
    }

    public function Update()
    {
        $this->recValores();

        $JuncaoP = implode("/", $this->participantes);
       
        $this->UpdateProjeto($this->ID, $this->nomeP, $this->dtinicial, $this->dtfinal, $this->valorP, $this->risco, $JuncaoP);
    }

    public function Cadastrar(){
    $this->recValores();
  $JuncaoP = implode("/", $this->participantes);
$this->CadastrarProjeto($this->nomeP, $this->dtinicial, $this->dtfinal, $this->valorP, $this->risco, $JuncaoP);
    }



    public function Lista_de_Projetos()
    {
        $result = $this->ListProjetos();
        echo "
          
        <form id='formexcluir'  method='POST' action='" . DIRPAGE . "home/Deletar-Projeto'>
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
        $I = 0;
        foreach ($result as $dados) {

            $dataI = new DateTime($dados['DTI']);
            $dtI = $dataI->format('d/m/Y');
            $dataF = new DateTime($dados['DTF']);
            $dtF = $dataI->format('d/m/Y');
            echo "
        <tr align='center' style='background-color:#E3EAEB;'>
			
            <td><STRONG>$dados[COD]</STRONG></td>
            <td>$dados[NP]</td>
            <td>$dtI</td>
            <td>$dtF</td>
            <td>$dados[V]</td>
            <td>$dados[R]</td>
          
   <!-- Button trigger modal -->


            <td> 
            <label class='btn-action glyphicons btn-info play_button' id='l1' for='Teste'>
            <a title='Simular Investimento'  href='" . DIRPAGE . "home/Simulação-de-Investimento/$dados[V]/$dados[R]'>
        
            <i></i></a></label> </td>

            <td> <input type='hidden' id='Teste' name=''>
            <label class='btn-action glyphicons btn-info group' id='l1' for='Teste'>
            <a title='Participantes' data-toggle='modal' data-target='#ModalParticipantes$I'> 
            <i></i></a></label> </td>";

            $this->ModalParticipantes($dados['P'], $I);
            $I++;
            echo "
            <td>
            
            <input class='offCheckbox' type='checkbox' id='$dados[COD]' name='id_cod[]' value='$dados[COD]'>
            <label class='btn-action glyphicons asel bin' id='l1' for='$dados[COD]'>
            <a title='Excluir'> 
            <i></i></a></label> </td>

            <td><a title='Editar' href='" . DIRPAGE . "home/Formulario-de-Edição-Projeto/$dados[COD]' target='blank'  class='btn-action glyphicons pencil btn-info'><i></i></a></td>
           
	       </tr>

            ";
        }


        echo "
        <!--FIM DO TR DE ADIÇÃO-->
	       </table>
          <hr>
           <input type='submit' class='redirect btn btn-primary' value='Excluir' name='Excluir' onclick='formExcluir()' for='formexcluir' >

           </form>";
    }


    public function Invest($Valor, $Risco)
    {

        echo "
        <script>window.onload = function() { document.getElementById('modalinvest').click(); };</script>
        <input type='hidden' id='modalinvest' class='btn btn-primary'  data-toggle='modal' data-target='#ModalInvest'>
   
<div class='modal fade' id='ModalInvest' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
<div class='modal-dialog' role='document'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h5 class='modal-title' id='exampleModalLabel'>Simulação de Investimento</h5>
       </div>
    <div class='modal-body'>
           
    <div class='span4'>
      <div class='control-group'>
          <label class='control-label'> Valor do Investimento </label>
           <div class='controls'>
              <div class='input-append'>
                <input name='ninvest' type='number' id='idinvestS' min='$Valor' placeholder='$Valor'  required>
               <input type='hidden' id='risco' value='$Risco'>
                </div>
           </div>
       </div>

       <div id='resultado'>

           </div>

  </div>
  
    </div>
  

    
    <div class='modal-footer'>
      <input type='submit' onclick='calcular()' class='btn btn-primary value='Simular' >
     </div>
  </div>

  </div>
</div> 


";
    }


    private function ModalParticipantes($ArratP, $I)
    {
        $Participantes = explode("/", rtrim($ArratP, FILTER_SANITIZE_STRING));
        echo "<div class='modal fade' id='ModalParticipantes$I' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
<div class='modal-dialog' role='document'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h5 class='modal-title' id='exampleModalLabel'>Participantes</h5>
      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>
    <div class='modal-body'>";

        foreach ($Participantes as $dados) {
            echo "$dados</br>";
        }

        echo "</div>
    
  </div>
</div>
</div>   ";
    }


    public function FormUpdate($COD)
    {
        $dados = $this->ListProjetosEsp($COD);

        echo "<!--MODAL UPDATE-->

    <script>window.onload = function() { document.getElementById('modalshow').click(); };</script>
    <input type='hidden' id='modalshow' class='btn btn-primary'  data-toggle='modal' data-target='.modal-alterar'>
    
        <div id='modalperfume' class='modal fade bd-example-modal-lg modal-alterar' tabindex='0' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
        
            <div class='modal-dialog modal-lg' role='document'>
                <div class='modal-content' style='padding: 15px 15px;'>
                <h5 class='modal-title' id='exampleModalLabel'>Edição de Projetos</h5>
          
                <form  method='POST' action='" . DIRPAGE . "home/Alterar-Projeto'>
                <!--FORM DE CADASTRO DE PROJETOS-->
                <input type='hidden' name='idcod' value='$dados[COD]'> 
                <div class='row-fluid'>   
                    <div class='row-fluid'>
                        <!--1° ROW-->
                        <div class='span4'>
                            <div class='control-group'>
                                <label class='control-label'>Nome do Projeto</label>
                                <div class='controls'>
                                    <div class='input-append'>
                                        <input name='nprojeto' type='text' id='idprojeto' class='span12' value='$dados[NP]' required>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class='span4'>
                            <div class='control-group'>
                                <label class='control-label'>Data de início</label>
                                <div class='controls'>
                                    <div class='input-append'>
                                        <input name='ndtinicio' type='date' id='iddtinicio' class='span11' value='$dados[DTI]' required>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class='span4'>
                            <div class='control-group'>
                                <label class='control-label'>Data de Término</label>
                                <div class='controls'>
                                    <div class='input-append'>
                                        <input name='ndtfim' type='date' id='iddtfim' class='span11' value='$dados[DTF]' required>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
        
                    <div class='row-fluid'>
                        <!--2° ROW-->
        
                        <div class='span4'>
                            <div class='control-group'>
                                <label class='control-label'> Valor do Projeto </label>
                                <div class='controls'>
                                    <div class='input-append'>
                                        <input name='nvalor' type='number' id='idvalor' class='span11' value='$dados[V]' required>
                                    </div>
                                </div>
                            </div>
                        </div>
        
        
        
                        <div class='span4'>
                            <div class='control-group'>
                                <label class='control-label'> Risco </label>
                                <div class='controls'>
                                    <div class='input-append'>
                                        <select class='span12' name='nrisco' id='idriscoF' required>
                                            <option disabled selected value=''>Selecione</option>
                                            <option value='0'>Baixo</option>
                                            <option value='1'>Médio</option>
                                            <option value='2'>Alto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
        
        
                        
                    </div>

                  <hr>

                  <div class='row-floid'>
                  <h5 class='modal-title' id='exampleModalLabel'>Participantes</h5>

                  
                  <table id='employee_table2' cellspacing='0' cellpadding='4 align='center' border='0' style='color:#333333;width:100%;border-collapse:collapse;'>
	             ";
        $Lista = explode("/", rtrim($dados['P'], FILTER_SANITIZE_STRING));
        $I = 0;
        foreach ($Lista as $dados) {

            echo " <tr id='$I'><td><input class='span8' type='text' name='name[]' value='$dados'></td> 
                     <td> <input class='btn btn-primary' type='button' value='Excluir' onclick='delete_row($I)'></td> 
                   </tr>";
            $I++;
        }
        echo "
                  </table>
                  <input class='btn btn-primary' type='button' onclick='add_rowEdit()' value='Novo Participante'> 
                  <hr>
                  <input class='btn btn-primary' onclick='checkFormUpdate()' id='subAlterar' type='submit'  value='Alterar'>

                  </div>
                </div>
        
        </form>        
                </div>
            </div>
        </div> <!-- FIM DO MODAL-->";
    }
}
