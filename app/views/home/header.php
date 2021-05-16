<script type="text/javascript">
        function add_row() {
            $rowno = $("#employee_table tr").length;

            $rowno = $rowno + 1;
            $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><input  class='span12'  type='text' name='name[]' placeholder='Nome Completo' required><input class='btn btn-primary' type='button' value='Excluir' onclick=delete_row('row" + $rowno + "')></td></tr>");
        }

        function delete_row(rowno) {
            $('#' + rowno).remove();
        }




    </script>

<script src="<?php echo DIRJS?>/meujs.js"></script>
<link rel="stylesheet" href="<?php echo DIRCSS?>/select_options.css">