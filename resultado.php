<body style="background-color:#BBB;">
<?php
require_once('view/template.php');
require_once('simplex.php');
$simplex = new Simplex;
$tela = new template;
$tela->SetTitle('Método Simplex');
$tela->SetProjectName('Método Simplex ----------- BSI 5° A/S');
session_start();
$etapa = 0;
$tabela = array();
$linhaZ = array();
$conteudo='';
$qtderepeticoes=1;
$qtdecolunas = $_SESSION['qtdevariaveis'] + $_SESSION['qtderestricoes'] +2 ;	
$qtdelinhas = $_SESSION['qtderestricoes'] + 2;
$solucao = 0 ;
//0 - otima
//1 - indeterminada
//2 - impossivel

$passoapasso=$_GET['passoapasso'];

$tabela[0][0]="Base";
	for ($coluna=1; $coluna <= $_SESSION['qtdevariaveis'] ; $coluna++)
	{ 
		$tabela[0][$coluna]='X<sub>'.$coluna.'</sub>';
	}
	for ($coluna=$_SESSION['qtdevariaveis']+1; $coluna <= $_SESSION['qtderestricoes']+$_SESSION['qtdevariaveis'] ; $coluna++)
	{ 
		$tabela[0][$coluna]='F<sub>'.($coluna-$_SESSION['qtdevariaveis']).'</sub>';
	}
	$tabela[0][$coluna]='B';

    for ($linha=1; $linha <= $_SESSION['qtderestricoes']; $linha++)
    { 
		$tabela[$linha][0]='F<sub>'.$linha.'</sub>';
		for ($coluna=1; $coluna <= $_SESSION['qtdevariaveis']; $coluna++)
		{ 
			$tabela[$linha][$coluna]=$_SESSION['r'.$linha.'_'.$coluna];
		}
		for ($coluna=$_SESSION['qtdevariaveis']+1; $coluna <=  $_SESSION['qtderestricoes']+$_SESSION['qtdevariaveis'] ; $coluna++)
		{ 
			if($linha!=$coluna-$_SESSION['qtdevariaveis'])
			{
				$tabela[$linha][$coluna]='0';
			}else{
				$tabela[$linha][$coluna]='1';
			}
		}
		$tabela[$linha][$coluna]=$_SESSION['resultado'.$linha];
	}
	$tabela[$_SESSION['qtderestricoes']+1][0]='Z';
	for ($coluna=1; $coluna <= $_SESSION['qtdevariaveis'] ; $coluna++)
	{
		if ($_SESSION['objetivo2']=='+')
		{ 
		    $tabela[$_SESSION['qtderestricoes']+1][$coluna]=($_SESSION['z'.$coluna])*-1;
	    }else{
			$tabela[$_SESSION['qtderestricoes']+1][$coluna]=$_SESSION['z'.$coluna];
		}
	}
	for ($coluna=$_SESSION['qtdevariaveis']+1; $coluna <= $_SESSION['qtderestricoes']+$_SESSION['qtdevariaveis']+1; $coluna++)
	{ 
		 $tabela[$_SESSION['qtderestricoes']+1][$coluna]=0;
	}
$_SESSION['tabelainicial'] = $tabela;

do{
	//descobre quem entra e sai da base
	$etapa++;
	if ($passoapasso=='S')
	{
		$conteudo=$conteudo.'<strong><h3 style="text-align:center;">'.$qtderepeticoes.'<sup>a</sup> Iteração</h3></strong>';
		$conteudo=$conteudo.'<br><h4>Etapa '.$etapa.': Descobrindo quem entra e quem sai da base.</h4>';
		$conteudo=$conteudo.'<h5 style="color:green;">Quem entra na base?</h5>';
		$conteudo=$conteudo.'<h5><p><p>O valor mais negativo existente na função objetivo.</p></p></h5>';
		$conteudo=$conteudo.'<h5 style="color:yellow;">Quem sai da base?</h5>';
		$conteudo=$conteudo.'<h5><p><p>O menor coeficiente da divisão entre a coluna B pela coluna que entrará na base.</p></p></h5>';
	}
	$simplex->SetTabela($tabela);
	$_SESSION['tabelafinal'] = $tabela;
	if ($passoapasso=='S')
	{
		$conteudo=$conteudo.$simplex->MostraTabela('12',$qtdecolunas,$qtdelinhas); 
	}

	//pega o menor valor da linha Z para saber que entra na base
	$menor = 99999999999;
	$ColunaDoMenor;
	for ($coluna=1; $coluna < $qtdecolunas ; $coluna++)
	{ 
		if ($tabela[$qtdelinhas-1][$coluna]<$menor)
		{
			$menor=$tabela[$qtdelinhas-1][$coluna];
			$ColunaDoMenor=$coluna;
	   	}
	}

	//pega quem sai
	$impossivel = true;
	$divisao;
	$menor=9999999999;
	$LinhaDoMenor=0;
	$contas=array();
	$resultadosdivisao=array();
	for ($linha=1; $linha <$qtdelinhas-1; $linha++)
	{ 
		if(($tabela[$linha][$qtdecolunas-1]>=0) and ($tabela[$linha][$ColunaDoMenor]>0))
		{
			$divisao=$tabela[$linha][$qtdecolunas-1]/$tabela[$linha][$ColunaDoMenor];
			array_push($resultadosdivisao, $tabela[$linha][$qtdecolunas-1]/$tabela[$linha][$ColunaDoMenor]);
			array_push($contas,$tabela[$linha][$qtdecolunas-1].'/'.$tabela[$linha][$ColunaDoMenor].'='.$tabela[$linha][$qtdecolunas-1]/$tabela[$linha][$ColunaDoMenor]);
			if($divisao<$menor)
			{
				$menor=$divisao;
				$LinhaDoMenor=$linha;
			}
			$impossivel = false;
		}
	}

	//para a repeticao caso nao tenha quem sai da base
	if ($impossivel)
	{
		$solucao=2;
		break;
	}

	$pivo = $tabela[$LinhaDoMenor][$ColunaDoMenor];
	$naobasicas = array();

	if ($passoapasso=='S')
	{
		$conteudo=$conteudo.'<h5 style="color:green;"><strong>Quem entra na base :</strong>'.$tabela[0][$ColunaDoMenor].'</h5>';
		$conteudo=$conteudo.'<h5 style="color:yellow;"><strong>Quem Sai da base :</strong>'.$tabela[$LinhaDoMenor][0].'</h5>';
		$conteudo=$conteudo.'<h5><strong>Calculos para identificar quem sai da base (menor valor):</strong><br></h5>';
	}

	array_push($naobasicas, $tabela[$LinhaDoMenor][0]);
	
	if ($passoapasso=='S')
	{
		for ($i=0; $i < count($contas); $i++)
		{ 
			$conteudo=$conteudo.'<h5>'.$contas[$i].'<br></h5>';
		}
	}

	//testa se tem numeros negativos nos resultados das divisoes , se tiver , para a repeticao e define com impossivel  
	//foi feito desta forma pois se eu colocasse o break dentro do for ele pararia o for e nao do do-while
	$negativos=0;
	for ($i=0; $i < count($resultadosdivisao); $i++)
	{ 
		if ($resultadosdivisao[$i]>0)
		{
	   		$negativos++;
		}
	}

	if ($negativos<0)
	{
		$solucao=2;
		break;
	}
	//testa se tem numeros negativos nos resultados das divisoes , se tiver , para a repeticao e define com impossivel  
	
	//entra e sai da base
	$tabela[$LinhaDoMenor][0] = $tabela[0][$ColunaDoMenor];  

	if ($passoapasso=='S')
	{
		$etapa++;
		$conteudo=$conteudo.'<br><h4>Etapa '.$etapa.': Dividindo a linha do pivo.</h4>';
		$conteudo=$conteudo.'<h5>O encontro da variável que entra na base com a variável que sai da base é denominado pivô. Nesta iteração o valor do pivô é <strong style="color:blue;">'.$pivo.'</strong>;</h5>';
	}
	$simplex->SetTabela($tabela);
	$_SESSION['tabelafinal'] = $tabela;
	if ($passoapasso=='S')
	{
		$conteudo=$conteudo.$simplex->MostraTabela('12',$qtdecolunas,$qtdelinhas);
	}

	if ($pivo==0)
	{
		$solucao=2;//impossivel
		break;
	}

	$ValoresLinha = array();
	for ($coluna=1; $coluna < $qtdecolunas; $coluna++)
	{ 
		$tabela[$LinhaDoMenor][$coluna]= $tabela[$LinhaDoMenor][$coluna].'/'.$pivo;
		array_push($ValoresLinha,$tabela[$LinhaDoMenor][$coluna]/$pivo);
	}

	if ($passoapasso=='S')
	{
    	$etapa++;
		$conteudo=$conteudo.'<br><h4>Etapa '.$etapa.': Dividindo a linha inteira do pivô pelo seu próprio valor.</h4>';
		$conteudo=$conteudo.'<br><h5> Nesta etapa,são realizadas operações para simplificar a linha inteira do pivô.</h5>';
	}

	$simplex->SetTabela($tabela);
	$_SESSION['tabelafinal'] = $tabela;
	if ($passoapasso=='S')
	{
   		$conteudo=$conteudo.$simplex->MostraTabela('6',$qtdecolunas,$qtdelinhas);
	}
	
	for ($coluna=1; $coluna < $qtdecolunas; $coluna++)
	{ 
		$tabela[$LinhaDoMenor][$coluna]= round($ValoresLinha[$coluna-1],1);
	}

	$simplex->SetTabela($tabela);
	$_SESSION['tabelafinal'] = $tabela;

	if ($passoapasso=='S')
	{
		$conteudo=$conteudo.$simplex->MostraTabela('6',$qtdecolunas,$qtdelinhas);
	}
	if ($passoapasso=='S')
	{
		//anular
		$etapa++;
		$conteudo=$conteudo.'<h4>Etapa '.$etapa.': Anulando os elementos da coluna do pivo </h4>';
	}
	$simplex->SetTabela($tabela);
	$_SESSION['tabelafinal'] = $tabela;

	if ($passoapasso=='S')
	{			
		$conteudo=$conteudo.'<h5>Foram anulados da colunas do pivo os numeros Ignorando o próprio pivo e os zeros. </h5>';
		$conteudo=$conteudo.$simplex->MostraTabela('6',$qtdecolunas,$qtdelinhas);
	}

	//aqui anula a coluna do pivo, usuando a funçao MostraColunaDoPivoAnulada que esta no arquivo simplex.php
	$simplex->SetTabela($tabela);
	$tabela = $simplex->MostraColunaDoPivoAnulada($tabela,$LinhaDoMenor,$ColunaDoMenor);
	$simplex->SetTabela($tabela);
	if ($passoapasso=='S')
	{
		$conteudo=$conteudo.$simplex->MostraTabela('6',$qtdecolunas,$qtdelinhas);
	}

	//mostra tabela com valores anulados
	$_SESSION['tabelafinal'] = $tabela;
	if ($passoapasso=='S')
	{
	    $conteudo=$conteudo.'.   ';
	}

	$_SESSION['tabelafinal'] = $tabela;
	$negativos=0;
	for ($coluna=1; $coluna < $qtdecolunas ; $coluna++)
	{ 
		if ($tabela[$qtdelinhas-1][$coluna]<0)
		{
			$negativos++;
		}
	}

	if ($negativos==0)
	{
		$solucao=0;
		break;
	}else{
		if ($qtderepeticoes==10)
		{
			$solucao=1;
			break;
	   	}
	}
	$qtderepeticoes++;
	$etapa =0;
}while($qtderepeticoes<=2);

$basicas= array();

//DEFINE OS RESULTADOS E DEVE-SE PARAR A REPETICAO COM UM BREAK QUANDO ALGUMA CONDICAO FOR TESTADA POSITIVAMENTE MOSTRA O RESULTADO
switch ($solucao) 
{
	case 0 :	
	  	if ($passoapasso!='S')
	  	{
			$simplex->SetTabela($_SESSION['tabelainicial']);
			$conteudo=$conteudo.'<h1>Tabela Inicial</h1>';
			$conteudo=$conteudo.$simplex->MostraTabela('12',$qtdecolunas,$qtdelinhas);
			$conteudo=$conteudo.'<br><hr><br>';
			$simplex->SetTabela($_SESSION['tabelafinal']);
			$conteudo=$conteudo.'<h1>Tabela Final</h1>';
			$conteudo=$conteudo.$simplex->MostraTabela('12',$qtdecolunas,$qtdelinhas);
			$conteudo=$conteudo.'<br><hr><br>';
		}		
		$conteudo=$conteudo.'
			<div class="container">
				<div class="row">
					<div class="alert alert-success" role="alert">
						<strong>Solução Ótima</strong>
					</div>
				</div>
			<div class="col-lg-6"> <h4>Variáveis Basicas</h4>';

        for ($linha=1; $linha < $qtdelinhas ; $linha++)
        { 
        	if ((substr(strtoupper(trim($tabela[$linha][0])),0,1)=='F'))
        	{
      			$conteudo=$conteudo.'<p>'.$tabela[$linha][0].' = '.$tabela[$linha][$qtdecolunas-1].'</p>';
        	}else{
        		if((substr(strtoupper(trim($tabela[$linha][0])),0,1)!='Z'))
        		{
        			$conteudo=$conteudo.'<p>'.$tabela[$linha][0].' = '.$tabela[$linha][$qtdecolunas-1].'</p>';
          		}
          	}
        }

	    $conteudo=$conteudo.'</div><div class="col-lg-6"> <h4>Variáveis não Basicas</h4>';
	  
	    $basicas=null;
	    $aux=0;
	    for ($i=1; $i < $qtdelinhas ; $i++)
	    { 
     		$basicas[$aux]=$tabela[$i][0];
			$aux++;
     	}

     	$_SESSION['qtdelinhas']=$qtdelinhas;
     	$_SESSION['qtdecolunas']=$qtdecolunas;

     	for ($i=1; $i < $qtdecolunas-1; $i++)
     	{ 
     		$contador=0;
     		$Variavel;
     		for ($y=1; $y < $qtdelinhas ; $y++)
     		{ 
     			if($tabela[0][$i]==$tabela[$y][0])
     			{
     				$contador++;
     			}     			
     		}
     		if($contador==0)
     		{
     				$conteudo=$conteudo.'<p>'.$tabela[0][$i].' = 0 </p>';
     	    }
     	}
     	$conteudo=$conteudo.'</div><br><br><div  style="text-align:center;"> <button name=button onclick="proxima();" class="btn btn-success">Análise de Sensibilidade</button></div><br><br>';
     	$conteudo=$conteudo.'<script>function proxima(){window.location.href="sensibilidade.php";}</script>';
		$conteudo=$conteudo.'<script></div></div><script>alert("Solução Ótima !!!!!");</script>';

		$_SESSION['tabela']=$tabela;
	break;

	case 1 :
		if ($passoapasso!='S')
		{
			$simplex->SetTabela($_SESSION['tabelainicial']);
			$conteudo=$conteudo.'<h1>Tabela Inicial</h1>';
			$conteudo=$conteudo.$simplex->MostraTabela('12',$qtdecolunas,$qtdelinhas);
			$conteudo=$conteudo.'<br><hr><br>';
			$simplex->SetTabela($_SESSION['tabelafinal']);
			$conteudo=$conteudo.'<h1>Tabela Final</h1>';
			$conteudo=$conteudo.$simplex->MostraTabela('12',$qtdecolunas,$qtdelinhas);
			$conteudo=$conteudo.'<br><hr><br>';
		}

		$conteudo=$conteudo.'
			<div class="container">
			 	<div class="row">
					<div class="alert alert-info" role="alert">
			        	<strong>Solução indeterminada !!!!!!</strong>
			        	<strong>Dentro do limite de repetições não foi possivel positivar Z</strong>
			        </div>
   				</div>
   			</div><script>alert("Solução indeterminada !!!!!");</script>';
   	break;

	default:
		if ($passoapasso!='S')
		{
			$simplex->SetTabela($_SESSION['tabelainicial']);
			$conteudo=$conteudo.'<h1>Tabela Inicial</h1>';
			$conteudo=$conteudo.$simplex->MostraTabela('12',$qtdecolunas,$qtdelinhas);
			$conteudo=$conteudo.'<br><hr><br>';
			$simplex->SetTabela($_SESSION['tabelafinal']);
			$conteudo=$conteudo.'<h1>Tabela Final</h1>';
			$conteudo=$conteudo.$simplex->MostraTabela('12',$qtdecolunas,$qtdelinhas);
			$conteudo=$conteudo.'<br><hr><br>';
		}

		$conteudo=$conteudo.'
			<div class="container">
			 	<div class="row">
					<div class="alert alert-danger" role="alert">
			        	<strong>Solução impossivel !!!!!!!!!</strong>
			        </div>
   				</div>
   			</div><script>alert("Solução impossivel !!!!!");</script>';
	break;
}

$tela->SetContent($conteudo);
$tela->ShowTemplate();
?>