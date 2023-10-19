# EventMaster
Projeto final--TI

Empresa: EventoMaster 

Escopo do Sistema de Gerenciamento de Projetos de Eventos: 
A empresa tem como objetivo facilitar a organização de eventos, fornecendo uma plataforma para gerenciar todos os aspectos do planejamento de um evento, desde o início até a conclusão.  

Cronograma: ainda não decidi datas e tudo vai encaminhar de acordo com o andar e início do projeto, fazer etapa por etapa e ir tirando dúvidas com o senhor  

Funcionalidades do Sistema: 
Página de Registro (register.php): 
Formulário de registro que coleta informações do organizador do evento, incluindo nome, empresa, email e senha. 
Validação dos campos para garantir que sejam preenchidos corretamente.
Verificação se o email já está em uso. 
Armazenamento seguro das informações do organizador em um banco de dados após o registro bem-sucedido. 

Página de Login (login.php): 
Formulário de login que solicita email e senha. 
Validação dos campos de entrada. 
Verificação das credenciais no banco de dados. 
Criação de uma sessão de organizador após o login bem-sucedido. 

Página Inicial (dashboard.php): 
Uma página inicial após o login que exibe os projetos de eventos do organizador. 
Exibição de informações do organizador, como nome e empresa. 
Lista de projetos de eventos com opções para adicionar, editar e excluir projetos. 

Adicionar Projetos de Eventos: 
Página para criar um novo projeto de evento, com campos para título, descrição, data, local, e outras informações relevantes. 
Associação dos projetos de eventos com o organizador logado. 

Editar Projetos de Eventos: 
Possibilidade de editar detalhes de projetos de eventos já criados.

Excluir Projetos de Eventos: 
Opção para excluir projetos de eventos da lista do organizador. 

Sistema de Autenticação: 
Verificação da sessão para garantir que apenas organizadores autenticados acessem as páginas protegidas. 
Página de logout para encerrar a sessão do organizador. 

Banco de Dados: 
Utilização de um banco de dados para armazenar informações dos organizadores e detalhes dos projetos de eventos. 
Tabelas para armazenar informações de organizadores (ID, nome, empresa, email, senha) e informações de projetos de eventos (ID do projeto, título, descrição, data, local, ID do organizador associado). 

Segurança: 
Implementação de medidas de segurança para proteger contra injeções de SQL e XSS. 
Restrição de tipos de arquivos e validação de dados do projeto de eventos para evitar informações incorretas. 

Interface de Usuário (UI): 
Utilização de HTML, CSS e JavaScript para criar uma interface de usuário atraente e responsiva. 
Personalização da interface de usuário de acordo com o tema do evento, em vez de usar apenas Bootstrap.  

Dificuldades: Tenho alta dificuldade com front end e deixar o sistema mais bonito e agradável. 
