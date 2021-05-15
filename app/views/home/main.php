<div id="content">
    <h3 class="glyphicons notes_2">
        <i>Projetos</i>
    </h3>
    <form>
        <!--FORM DE CADASTRO DE PROJETOS-->
        <div class="row-fluid">

            <div class="row-fluid">
                <!--1° ROW-->
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Nome do Projeto *</label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="nprojeto" type="text" id="idprojeto" class="span12" placeholder="Ex: Controle de Servos" require>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Data de início</label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="ndtinicio" type="date" id="iddtinicio" class="span11" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Data de Término</label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="ndtfim" type="date" id="iddtfim" class="span11" required>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row-fluid">
                <!--2° ROW-->

                <div class="span4">
                    <div class="control-group">
                        <label class="control-label"> Valor do Projeto </label>
                        <div class="controls">
                            <div class="input-append">
                                <input name="nvalor" type="number" id="idvalor" class="span11" required>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="span4">
                    <div class="control-group">
                        <label class="control-label"> Risco </label>
                        <div class="controls">
                            <div class="input-append">
                                <select class="span12" name="nrisco" id="idrisco">
                                    <option selected="selected">Selecione</option>
                                    <option value="0">Baixo</option>
                                    <option value="1">Médio</option>
                                    <option value="2">Alto</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
</div>