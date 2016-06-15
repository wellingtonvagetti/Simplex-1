# NOTA DE LIBERAÇÃO - SIMPLEX E MOCHILA

## Informações adicionais na Wiki

<a href="https://github.com/mahefema/Simplex/wiki/Nota-Libera%C3%A7%C3%A3o">Nota Liberação</a><br/>
<a href="https://github.com/mahefema/Simplex/wiki/Manual-Simplex">Manual Simplex</a><br/>
<a href="https://github.com/mahefema/Simplex/wiki/Manual-Mochila">Manual Mochila</a>

## Nome dos Itegrantes do Grupo

1. Maycon Henrique Ferreira Martins, RA: 537640
2. Tiago Alves da Silva, RA: 539661
3. Paulo Sergio Bonfim Cristanello, RA: 527998
4. Wellington Veguetti, RA: 541567

## INTRODUÇÃO

Este documento provê uma visão geral da versão do aplicativo Simplex e Mochila que está sendo liberada. Aqui descreveremos as funcionalidades do aplicativo, bem como seus problemas e limitações conhecidos. Por último são descritas as demandas e 	os problemas que foram resolvidos para liberação da versão atual.

## LINK DE ACESSO A APLICAÇÃO ONLINE

[Acessar Aplicação Simplex](http://simplex-bsi.16mb.com) ou [Mochila](http://simplex-bsi.16mb.com/mochila.html)

### 1. NOTA DE RELEASE A SER PUBLICADO

Simplex

* Funções MIN E MAX
* Não possuir número fixo para variáveis e restrições.
* Demonstrar tabela da programação dinâmica.Não possuir número fixo de itens.
* Gerar passo a passo, que mostra todas as iterações necessárias para o resultado final.
* Análise de Sensibilidade

Mochila

* Capacidade da Mochila
* Peso e valor de itens
* Tabela de amostragem
* Lista do peso e valores de itens

### 2. PROBLEMAS CONHECIDOS E LIMITAÇÕES

* Necessário ao menos 1 conexão mínima com a internet.
* No projeto Simplex, em casos específicos de execução onde o usuário passa muitas variáveis ou restrições o, a execução pode ter uma demora para sua conclusão.
		
### 3. DATAS IMPORTANTES

####Segue abaixo as datas importante do desenvolvimento:
		
|Data|Evento|
|---------------|---------------|
|19/03|Criação da Interface Gráfica.|
|20/03|Criação das interações e variáveis dinâmicos.|
|26/03|Implementação do método Maximizar e das variáveis de folga.|
|27/03|Definição da regra quem entra e quem sai e linha do pivô divididas pelo pivô.|
|02/04 e 03/04|Implementação do método Minimizar.|
|09/04 e 10/04|Adicionado função de amostragem passo-a-passo.|
|16/04 e 17/04|Testes e correção de bugs.|
|14/05|Adicionado Análise de Sensibilidade.|
|15/05|Testes finais.|
|18/05|Liberação versão final.|
|01/06|Implementação Mochila|
|08/06|Adicionado Mochila na aplicação|
		
### 4. COMPATIBILIDADE
		
Segue abaixo os requisitos:
		
|Requisitos|Ferramenta|
|-----------|---------------|
|Navegadores|Mozzilla Firefox, Chrome, Internet Explorer e Microsoft Edge|
|Sistema operacional|Linux e Windows|
|Dispositivos Móveis|IOS e Android|

|Tecnologias||
|-----------|---------------|
|Linguagem de programação|PHP e JavaScript|
|Tecnologia WEB|HTML, CSS, Bootstrap|
|IDE|Sublime Text 2|
|Servidor Web|Hostinger|

### 5. PROCEDIMENTO E ALTERAÇAO DE CONFIGURAÇÃO DO AMBIENTE

Projeto foi feito com base em PHP e JavaScript, pelo conhecimento dos membros do grupo e também para conhecimento. Parte visual foi usado HTML, CSS3 e Bootstrap, pela sua fácil adesão e modificação. Hospedagem feita no Hostinger, por já ter sido usado antes por membros do grupo.

### 6. ATIVIDADES REALIZADAS NO PERÍODO

Nessa liberação foram contemplados os seguintes itens:

|Cód|Título|Tarefa|Situação|Observação|
|---|----------|----------------|---------------------|-----------------|                                                                            	
|1|Maximizar|Montar a Tabela Simplex, e possibilitar o usuário a maximizar modelos de simplex com sistemas lineares.| Concluído|Apenas restrições de “<=”|
|2|Minimizar|Montar a Tabela Simplex, e possibilitar o usuário a minimizar modelos de simplex com sistemas lineares.|   Concluído|Apenas restrições de “<=”|
|3|Adição de restrições|Possibilitar o usuário a adicionar inputs para maiores números de restrições.                           	|Concluído||
|4|Demonstrar passo a passo|Demonstrar ao usuário as alterações na tabela causada pelas iterações do método simplex.| Concluído||
|5|Tabela de Sensibilidade|Demonstrar ao usuário tabela de sensibilidade.|Concluído||
|6|Knapsack (Mochila)|Módulo para uso completo de Knapsack (Algorítimo para solução do Problema da Mochila).|Concluído||
 
