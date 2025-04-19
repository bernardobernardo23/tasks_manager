# Gerenciador de Tarefas

Este é um sistema simples de **gerenciamento de tarefas** desenvolvido com **PHP (CodeIgniter 4)**. Ele permite que usuários **cadastrem, editem, excluam e visualizem tarefas**, além de fornecer uma **API RESTful** completa

## Tecnologias Utilizadas e necessárias para a execução

- [**PHP 8+**](https://www.php.net/downloads.php)
- [**Composer**](https://getcomposer.org/download/)
- [**MySQL**](https://dev.mysql.com/downloads/mysql/)
- [**XAMPP** (opcional, para unir PHP + Apache + MySQL em um só)](https://www.apachefriends.org/index.html)
- [**Git** (para clonar o repositório)](https://git-scm.com/)
- **HTML/CSS**
- **Bootstrap**

## Funcionalidades

-  Criar novas tarefas com título, descrição e status via sistema com banco de dados
-  Ordenas tarefas de acordo com o status, para controle de tarefas pendentes, em andamento e concluída
-  Editar uma tarefa existente
-  Excluir tarefas
-  API RESTful com os métodos:
  - `GET`: Listar e buscar tarefas
  - `POST`: Criar novas tarefas
  - `PUT`: Atualizar tarefas
  - `DELETE`: Remover tarefas

---

## Como executar localmente

### 1. Instale as dependências via Composer dentro do terminal
```
composer install
```

### 2. No terminal, Clone este repositório

```
git clone https://github.com/bernardobernardo23/tasks_manager.git
```



### 3. Configure o ambiente (.env)
Renomeie o arquivo env para .env:

```
cp env .env
```
Depois, edite o arquivo .env e configure as informações do banco de dados ,caso não esteja:
```
database.default.hostname = localhost
database.default.database = tarefas
database.default.username = root
database.default.password =
```
 Use root como usuário e senha em branco se estiver usando o XAMPP.

### 4.Crie o Banco de dados
Se estiver usando o XAMPP, abra e inicialize os servidores Apache e MySql, 
após acesse o PhpMyAdmin -->http://localhost/phpmyadmin/
- Crie um novo banco de dados com o nome tasks_db e digite o código SQL : 

```
CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  status ENUM('pendente', 'em andamento', 'concluída') DEFAULT 'pendente',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```
### 5.Iniciando o servidor Codeigniter
No terminal, vá até a pasta do projeto e inicialize o servidor
```
cd C:\xampp\htdocs\tasks_manager
php spark serve
```
### 6.Acessando o sistema
Ao rodar o servidor digite http://localhost:8080/tasks no navegador e acesse o sistema  

## Uso da API




