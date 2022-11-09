## O que é?

Este projeto exibe mensagens que estão armazenadas em uma tabela no banco de dados (sqlite3 por default) e permite a criação de novas mensagens através de um formulário.

## Estrutura do Projeto

Este projeto faz uso do Laravel 6.20, Sqlite3 e Bootstrap 5.2.
Lembre-se de rodar com o php >= 7.2 e php < 8.0.
No linux, para alterar a versão do php use: sudo update-alternatives --config php

## Como entender este projeto

Observe os arquivos na seguinte ordem:
- Migration: /database/migrations/2022_11_09_113700_add_mensagem_table.php.
- Model: /app/Mensagem.php.
- Seeder: /database/seeds/MensagemSeeder.php. e /database/seeds/DatabaseSeeder.php.
- Route: /routes/web.php.
- Controller: /app/Http/Controllers/MensagemController.php.
- View: /resourses/Views/formulario.blade.php.

## Migration

Este projeto está fazendo uso de uma migration que cria uma tabela chamada mensagens

## Model

Este projeto tem um Model chamado Mensagem

## Seeder

Este projeto tem um seeder chamado MensagemSeeder que cria 3 tuplas na tabela mensagens no banco de dados

## Route

Há apenas 2 rotas:
Rota: GET / -> rota que carrega o formulário exibindo as mensagens já existentes.
Rota: POST /salvarmensagem -> recebe os dados do formulário e salva no banco.

## Controller

O controller que está operacionalizando a aplicação se chama MensagemController e nele há dois métodos:

carregarFormulario(): método que carrega as mensagens do banco e exibe a view formulário.

salvarNovaMensagem(Request): método que recebe os dados preenchidos no formulário, faz a validação, salva os dados no banco e retorna para a rota "/" .

## View

Toda interface (com bootostrap) está contida em apenas uma view chamada formulario.blade.php