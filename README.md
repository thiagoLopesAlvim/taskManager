# Gerenciador de Tarefas

## Descrição

O **Gerenciador de Tarefas** é um sistema de gerenciamento de tarefas simples, desenvolvido com Laravel, Bootstrap e JavaScript. O projeto permite aos usuários adicionar, editar, excluir e marcar tarefas como concluídas, além de filtrar tarefas por status.

## Instruções de Instalação

### Requisitos

- PHP >= 8.1
- Composer
- MySQL

### Passo a Passo para Rodar o Projeto Localmente

1. **Clone o Repositório**

   ```bash
   git clone https://github.com/thiagoLopesAlvim/taskManager.git
   cd taskManager
   ```

2. **Instale as Dependências do PHP**

  ```bash
  composer install
  ```

3. **Configure o Arquivo .env (Localizado na Pasta raiz do projeto) para conectar o banco de dados**
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tasks
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Gere a Chave de Aplicação**
   ```bash
   php artisan key:generate
   ```
5. **Execute as Migrations**
   ```bash
   php artisan migrate
   ```
6. **Inicie o Servidor Local**
   ```bash
   php artisan serve
   ```


