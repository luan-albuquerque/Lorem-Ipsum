<script type="text/javascript">
        function add_row() {
            $rowno = $("#employee_table tr").length;

            $rowno = $rowno + 1;
            $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><input  class='span12'  type='text' name='name[]' placeholder='Nome Completo' required><input class='btn btn-primary' type='button' value='Excluir' onclick=delete_row('row" + $rowno + "')></td></tr>");
        }

        function delete_row(rowno) {
            $('#' + rowno).remove();
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
    </script>

<script src="<?php echo DIRJS?>/meujs.js"></script>
<link rel="stylesheet" href="<?php echo DIRCSS?>/select_options.css">