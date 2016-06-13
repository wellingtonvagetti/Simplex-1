# Simplex e Mochila - Pesquisa Operacional

<a href="http://simplex-bsi.16mb.com"/>Acessar aplicação Simplex</a>
<br/>
<a href="http://simplex-bsi.16mb.com/mochila.html"/>Acessar aplicação Mochila</a>

<strong>Grupo</strong>

<table style="width:100%">
  <tr>
    <td><strong>Nome</strong></td>
    <td><strong>RA</strong></td> 
  </tr>
  <tr>
    <td>Maycon Henrique Ferreira Martins</td>
    <td>537640</td> 
  </tr>
   <tr>
    <td>Tiago Alves da Silva</td>
    <td>539661</td> 
  </tr>
  <tr>
    <td>Paulo Sergio Bonfim Cristanello</td>
    <td>527998</td> 
  </tr>
  <tr>
    <td>Wellington dos Santos Vaguetti</td>
    <td>541567</td> 
  </tr>
</table>

<h1>Nota de Liberação: Simplex</h1>

<h2>INTRODUÇÃO</h2>

<p>Este documento provê uma visão geral da versão do aplicativo Simplex que está sendo liberada. Aqui descreveremos as funcionalidades do aplicativo, bem como seus problemas e limitações conhecidos. Por último são descritas as demandas e os problemas que foram resolvidos para liberação da versão atual.</p>

<h2>1. NOTA DE RELEASE A SER PUBLICADO</h2>

<ul> 
  <li>Funções MIN E MAX</li>
  <li>Não possuir número fixo para variáveis e restrições.</li>
  <li>Demonstrar tabela da programação dinâmica.Não possuir número fixo de itens.</li>
  <li>Gerar passo a passo, que mostra todas as iterações necessárias para o resultado final.</li>
  <li>Análise de Sensibilidade
</ul>

<h2>2. PROBLEMAS CONHECIDOS E LIMITAÇÕES</h2>

<h4>Limitações</h4>

<ul>
  <li>Necessário ao menos 1 conexão mínima com a internet.</li>
  <li>No projeto Simplex, em casos específicos de execução onde o usuário passa muitas variáveis ou restrições o, a execução pode ter uma demora para sua conclusão.</li>
<ul>

<h2>3. DATAS IMPORTANTES</h2>

<h4>Segue abaixo as datas importante do desenvolvimento:</h4>

<table style="width:100%">
<tr>
    <td>Data</td>
    <td>Evento</td> 
  </tr>
  <tr>
    <td>19/03</td>
    <td>Criação da Interface Gráfica.</td> 
  </tr>
  <tr>
    <td>20/03</td>
    <td>Criação das interações e variáveis dinâmicos.</td> 
  </tr>
  <tr>
    <td>26/03</td>
    <td>Implementação do metodo Maximizar e das variaveis de folga.</td> 
  </tr>
  <tr>
    <td>27/03</td>
    <td>Definição da regra quem entra e quem sai e linha do pivo divididas pelo pivô.</td> 
  </tr>
  <tr>
    <td>02/04 e 03/04</td>
    <td>Implementação do metodo Minimizar.</td> 
  </tr>
  <tr>
    <td>09/04 e 10/04</td>
    <td>Adicionado função de amostragem passo-a-passo.</td> 
  </tr>
  <tr>
    <td>16/04 e 17/04</td>
    <td>Testes e correção de bugs.</td> 
  </tr>
  <tr>
    <td>14/05</td>
    <td>Adicionado Análise de Sensibilidade</td> 
  </tr>
    <tr>
    <td>15/05</td>
    <td>Testes finais.</td> 
  </tr>
  <tr>
    <td>18/05</td>
    <td>Liberação versão final.</td> 
  </tr>
</table>

<h2>4. COMPATIBILIDADE</h2>

<p>Segue abaixo os requisitos</p>

<table style="width:100%">
  <tr>
    <td>Requisitos</td>
    <td>Ferramentas</td> 
  </tr>
  <tr>
    <td>Navegadores Browser</td>
    <td>
    	<ul>
    	  <li>Mozila Firefox</li>
        <li>Chrome</li>
        <li>Internet Explorer</li>
        <li>Microsoft Edge</li>
    	</ul>
  </tr>
  <tr>
    <td>Sistema operacional</td>
    <td>
      <ul>
    	  <li>Linux</li>
        <li>Windows</li>
    	</ul>
    </td> 
  </tr>
  <tr>
    <td>Dispositivos Móveis</td>
    <td>
      <ul>
    	  <li>iOS</li>
        <li>Android</li>
    	</ul>
    </td>
</table>

<table style="width:100%">
  <tr>
    <td> </td>
    <td>Tecnologia</td> 
  </tr>
  <tr>
    <td>Linguagem de Programação</td>
    <td>
    	<ul>
    	  <li>PHP</li>
        <li>JavaScript</li>
    	</ul>
    </td>
  </tr>
<tr>
    <tr>
    <td>Tecnologia WEB</td>
    <td>
    	<ul>
    	  <li>HTML</li>
        <li>CSS</li>
        <li>Bootstrap</li>
    	</ul>
    </td>
  </tr>
<tr>
    <td>ID</td>
    <td>
    	<ul>
    	  <li>Sublime Text 2</li>
        <li>CSS</li>
        <li>Bootstrap</li>
    	</ul>
    </td>
  </tr>
<tr>
    <td>Servidor WEB</td>
    <td>
    	<ul>
    	  <li>Hostinger</li>
    	</ul>
    </td>
</tr>
</table>

<h2>5. PROCEDIMENTO E ALTERAÇAO DE CONFIGURAÇÃO DO AMBIENTE</h2>

<p>Projeto foi feito com base em PHP, pelo conhecimento dos membros do grupo.
Parte visual foi usado HTML, CSS3 e Bootstrap, pela sua fácil adesão e modifição.
Hospedagem feita no hostinger, por já ter sido usado antes por membros do grupo.</p>

<h2>6. ATIVIDADES REALIZADAS NO PERÍODO</h2>

<h4>Nessa liberação foram contemplados os seguintes itens:</h4>

<table style="width:100%">
<tr>
    <td>Cód</td>
    <td>Título</td>
    <td>Tarefa</td>
    <td>Situação</td>
    <td>Observação</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Maximizar</td> 
    <td>Montar a Tabela Simplex, e possibilitar o usuário a maximizar modelos de simplex com sistemas lineares.</td>
    <td>Concluído</td>
    <td>Apenas restrições de “<=”</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Minimizar</td> 
    <td>Montar a Tabela Simplex, e possibilitar o usuário a maximizar modelos de simplex com sistemas lineares.</td>
    <td>Concluído</td>
    <td>Apenas restrições de “<=”</td>
  </tr>
<tr>
    <td>3</td>
    <td>Adição de restrições</td> 
    <td>Possibilitar o usuário a adicionar inputs para maiores números de restrições.</td>
    <td>Concluído</td>
    <td></td>
</tr>
<tr>
    <td>4</td>
    <td>Demonstrar passo a passo</td> 
    <td>Demonstrar ao usuário as alterações na tabela causada pelas iterações do método simplex.</td>
    <td>Concluído</td>
    <td></td>
</tr>
<tr>
    <td>5</td>
    <td>Tabela de Sensibilidade</td> 
    <td>Demonstrar ao usuárioa tabela de sensibilidade.</td>
    <td>Pendente</td>
    <td>Conforme orientação do professor, aplicação apresenta resultados incorretos.</td>
</tr>
 
