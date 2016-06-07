<body style="background-color:#BBB;">
<?php
require('view/template.php');

//cria-se objeto da classe template e define a ele o titulo e o conteudo que será impresso
$tela = new template;
$tela->SetTitle('Método Simplex');
$tela->SetProjectName('Método Simplex ----------- BSI 5° A/S');

$conteudo='
  <form class="form-horizontal" action="restricoes.php" method="GET">
    <fieldset>

      <!-- Form Name -->
        <legend>Método Simplex - Vamos inserir os valores abaixo e calular o simplex.</legend>

      <!-- Entrada de Texto -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="qtdevariaveis">Qual a quantidade de variáveis?</label>  
          <div class="col-md-4">
            <input id="qtdevariaveis" name="qtdevariaveis" type="number" step="0.01" placeholder="Digite o valor da variável" class="form-control input-md" required="">
          </div>
        </div>

      <!-- Entrada de Texto -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="qtderestricoes">E de restrições?</label>  
          <div class="col-md-4">
            <input id="qtderestricoes" name="qtderestricoes" type="number" step="0.01" placeholder="Digite o valor de restrições" class="form-control input-md" required="">
          </div>
        </div>

      <!-- Seleção do Modo Max ou Min -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="objetivo">objetivo</label>
          <div class="col-md-4">
            <select id="objetivo" name="objetivo" class="form-control">
              <option value="max">Maximizar</option>
              <option value="min">Minimizar</option>
            </select>
          </div>
        </div>

      <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="submit"></label>
          <div class="col-md-4">
            <button name="submit" class="btn btn-primary btn-lg btn-block">Prosseguir</button>
          </div>
        </div>
    </fieldset>
  </form>
';

$tela->SetContent($conteudo);
$tela->ShowTemplate();
?>