<script type="text/javascript">
        function add_row() {
            $rowno = $("#employee_table tr").length;

            $rowno = $rowno + 1;
            $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><input  class='span12'  type='text' name='name[]' placeholder='Nome Completo' required><input class='btn btn-primary' type='button' value='Excluir' onclick=delete_row('row" + $rowno + "')></td></tr>");
        }

        function delete_row(rowno) {
            $('#' + rowno).remove();
        }




        function add_rowEdit() {
            $rowno = $("#employee_table2 tr").length;

            $rowno = $rowno + 1;
            $("#employee_table2 tr:last").after("<tr id='"+ $rowno +"'><td><input  class='span8'  type='text' name='name[]' placeholder='Nome Completo' required><input class='btn btn-primary' type='button' value='Excluir' onclick=delete_row('"+ $rowno+"')></td></tr>");
        }

      

    function calcular() {
        var n = parseInt(document.getElementById('idinvestS').value);
        var risco = parseInt(document.getElementById('risco').value);
        var minv = parseInt(document.getElementById('idinvestS').min);
        var retorno; 

        if(n >= minv){ 
        if(risco==0){ retorno = n * 0.05; }
        if(risco==1){ retorno = n * 0.1; }
        if(risco==2){ retorno = n * 0.2; } 
        
        document.getElementById('resultado').innerHTML ="Seu Retorno Será de= "+retorno;

      }

    }

    function formExcluir(){  
        var msg = confirm("Atenção: Deseja Excluir esse Registro?");
    if (msg){
      
        alert("Arquivo excluido com sucesso!");
       document.getElementByName('Excluir').submit();
    }
    else{
        alert("Operação Cancelada, o Registro não será Excluído!");
        addEventListener('submit', function (e) { e.preventDefault(); });

    }

}

function checkFormUpdate(){
    var msg = confirm("Atenção: Deseja Alterar esse Registro?");
    if (msg){
      
        alert("Arquivo Alterado com sucesso!");
       document.getElementById('subAlterar').submit();
    }
    else{
        alert("Operação Cancelada, o Registro não será Alterado!");
        addEventListener('submit', function (e) { e.preventDefault(); });

    }

    }

    


    </script>

<script src="<?php echo DIRJS?>/meujs.js"></script>
<link rel="stylesheet" href="<?php echo DIRCSS?>/select_options.css">