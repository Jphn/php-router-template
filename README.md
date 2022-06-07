# PHP ROUTER TEMPLATE

> Under development!

## Router - responsável por gerenciar as rotas da aplicação

URI - página requisitada pelo usuário;
ROUTES - array contendo todas as rotas cadastradas;
Middlewares - array contendo todos os middlewares que serão executados antes da execução da rota;

## Request - responsável por facilitar o acesso a informações da requisição do usuário

QueryParams - parâmetros passados via URL, no método GET;
PostVars - parâmetros passados pelo método POST;

## Response - responsável por gerenciar/facilitar o envio de respostas do usuário

HTTPStatusCode - código de status da resposta (default: 200);
Content-Type - tipo de conteúdo da resposta;
Headers - cabeçalhos da página;
