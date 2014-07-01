blog
====

##Sistema simples de um Blog didático feito em PHP (d)estruturado e MySQL 

Aprendizagem Industrial Programador de Computador - Brusque/SC
Unidade Curricular Linguagem de Programação Web

O objetivo deste Blog é mostrar conceitos didáticos sobre autenticação, login, integração com banco de dados e outros conceitos mais.

Também é um primeiro teste de integração entre o Netbeans com o Github

### Aulas
30 Sistema de Blog com Autenticação no Banco de Dados

31 Cadastro de novo usuários

32 Edição e Atualização de Perfil

33 Criação das tabelas de artigos e comentários

34 Página de Artigos e comentários buscando no Banco de Dados

45 Inserção de novos artigos e novos comentários (comentários podem ser anônimos)

### Piores práticas em desenvolvimento PHP
Praticamente todas estão presentes neste Blog, portanto, aprenda como não se faz!

O Top FAIL da lista até agora, inclui:

* Definições de classes múltiplas em um único arquivo
* Salvar senhas unhashed e sem criptografia em um banco de dados
* Usando uma variável global dentro de uma classe para obter uma conexão de banco de dados
* Usar variável com uma única letra
* Usando GET ou POST vars diretamente da entrada do usuário (sem validações de dados)
* Misturar HTML e PHP como se não houvesse amanhã.
* Fazer uso liberal de extract () depois de executar “SELECT *”
* Definir uma classe de exceção personalizada para cada classe
* Não usar conexão com o DB no padrão singleton
* Lançar contantes nos piores lugares
* Recriar register_globals em no código (analisando $ _REQUEST em um loop foreach)
* Requerer diretamente outro arquivo de classe dentro de um método de uma classe
* Não usar comentários e onde há comentários, usa-se coisas inúteis, como: “// isto inscreve um usuário” em um método chamado “SignIn”.
* Reaproveitamento de nomes de variáveis ​​para coisas diferentes
* Criar métodos, variáveis e arquivos com nomes pouco amigáveis e entendíveis

Leia mais em: [JORDACHE, R.]

[JORDACHE, R.]:http://www.profissionaisti.com.br/2013/09/as-piores-praticas-em-desenvolvimento-php/
