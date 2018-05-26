# Teste para vaga de Analista Desenvolvedor PHP

## Projeto
Desenvolver uma aplicação simples com um CRUD de produtos

# Instalação

- git clone https://github.com/uilhamello/teste-php.git

- Dar permissão de escrita no diretório /config/ Ex: chmod 0755 -R config/  ou alterando o Owner da pasta ao do server' User.

- Acessar o projeto via Browser. Ex: http://localhost/

- Uma página amigável solicitará os dados de conexão. Se a conexão foi efetuado com os dados informados, 
a página é redirecionada a página de login.

- Crie um usuário clicando no botão "Registrar-se"

- Será redirecionado à área privada onde poderá executar todas as ações requisitadas com a Model "Produtos"


## Descrição do Projeto

- Está desenvolvido com PHP Puro, PDO. 
- Organizado pela metodologia MVC
- Sistema de Migration para estruturar o banco de dados através do PHP. Desenvolví tomando como exemplo as nomenclaturas do Láravel.
- Arquivo de Route, porque todas as requisições estão centralizadas na Index do projeto, que destribui por módulos.
- A camada da View está em HTML puro, através de uma classe HTML na LIBs, que faz replace com os dados do Controller.

## Estrutura do Projeto

#### Libs/

- É o core do projeto, uma biblioteca de class PHP Puro, estruturado em MVC, que executam as tarefas triviais de cada camada.

#### App/

- Uma estrutura MVC d aaplicação que será executado.

#### Config/

- Todas as configurações do sistema, como banco de ados, ambiente etc.
-Aqui é gerado o config.ini onde ficam armazenadas os dados informados para a conexão ao banco de dados.


### Muito Obrigado!
