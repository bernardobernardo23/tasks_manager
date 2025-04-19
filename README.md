
#  Gerenciador de Tarefas

Este é um sistema simples de **gerenciamento de tarefas** desenvolvido com **PHP (CodeIgniter 4)**. Ele permite que usuários **cadastrem, editem, excluam e visualizem tarefas**, além de fornecer uma **API RESTful** completa.  
O projeto foi desenvolvido seguindo o padrão **MVC (Model-View-Controller)**, usando Controllers para lógica, Models para acesso ao banco e Views para a interface com o usuário.

---

## Tecnologias Utilizadas e Necessárias

- [**PHP 8+**](https://www.php.net/downloads.php)
- [**Composer**](https://getcomposer.org/download/)
- [**MySQL**](https://dev.mysql.com/downloads/mysql/)
- [**XAMPP** (opcional)](https://www.apachefriends.org/index.html)
- [**Git**](https://git-scm.com/)
- **HTML/CSS**
- **Bootstrap 5**

---

##  Funcionalidades

- Criar novas tarefas com título, descrição e status
- Ordenar tarefas de acordo com o status (pendente, em andamento, concluída)
- Editar e excluir tarefas
- API RESTful completa com os métodos:
  - `GET`: Listar e buscar tarefas
  - `POST`: Criar novas tarefas
  - `PUT`: Atualizar tarefas
  - `DELETE`: Remover tarefas

---

## Como Executar Localmente

### 1. Clone este repositório

```
git clone https://github.com/bernardobernardo23/tasks_manager.git
```
### 2. Arrumar arquivo php.ini
Abra o arquivo php.ini que esta dentro da pasta php  
Pressione Ctrl + F e procure por:
```
;extension=intl
```
Remova o ponto e vírgula (;) para ativar:
>Talvez seja necessário ativar a extensão zip dentro do arquivo php.ini, para arrumar pesquise por ";extension=zip" e tire o ;

### 3. Instale as dependências via Composer
Dentro da pasta do projeto :
```
composer install
```



### 4. Configure o ambiente (.env)

Renomeie o arquivo `env` para `.env` (manualmente ou via terminal):

```
cp env .env
```

Edite o `.env` com os dados do banco:

```
database.default.hostname = localhost
database.default.database = tasks_db
database.default.username = root
database.default.password =
```

> Se estiver usando o XAMPP, mantenha o usuário como `root` e senha em branco.

### 5. Crie o banco de dados
Se estiver usando XAMPP, abra e execute os servidores Apache e MySql para poder
acessar o phpMyAdmin: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)  
Crie um banco chamado `tasks_db` e execute o SQL abaixo:

```sql
CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  status ENUM('pendente', 'em andamento', 'concluída') DEFAULT 'pendente',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

#### Dados de exemplo (opcional):

```
INSERT INTO tasks (title, description, status) VALUES
('Estudar para prova', 'Focar nos tópicos de matemática', 'pendente'),
('Finalizar projeto PHP', 'Terminar o CRUD com validação', 'em andamento'),
('Enviar relatório mensal', 'Relatório enviado via e-mail', 'concluída');
```

### 6. Inicie o servidor local
No terminal, vá até a pasta do projeto e inicialize o servidor
```
cd C:\xampp\htdocs\tasks_manager
php spark serve
```

### 7. Acesse no navegador

```
http://localhost:8080/tasks
```

---

## Como Usar o Sistema

Ao acessar `/tasks`, você verá a **lista de tarefas existentes** (caso haja). Caso não haja nenhuma, clique em **"Adicionar nova Tarefa"** para adicionar.

Você também encontrará um botão **"Ordenar"**, com opções para reorganizar as tarefas por:

- Concluída primeiro
- Em andamento primeiro
- Pendente primeiro

Por padrão, as tarefas são exibidas em ordem de **ID (cronológica)**.

---

## Validações de Formulário

Ao criar ou editar uma tarefa, os seguintes critérios devem ser respeitados:

- **Título**: obrigatório, mínimo 3 e máximo 255 caracteres
- **Descrição**: obrigatória
- **Status**: deve ser um dos seguintes valores:
  - `pendente`
  - `em andamento`
  - `concluída`

Caso contrário, a tarefa não será salva e uma mensagem de erro será exibida, isso vale para inserção ou edição via sistema web ou com a API

---

##  Uso da API RESTful

Este projeto fornece uma **API RESTful** para integração externa.

### Endpoints Disponíveis:

- `GET /api/tasks` — Lista todas as tarefas
- `GET /api/tasks/{id}` — Retorna uma tarefa específica
- `POST /api/tasks` — Cria uma nova tarefa (JSON)
- `PUT /api/tasks/{id}` — Atualiza uma tarefa
- `DELETE /api/tasks/{id}` — Exclui uma tarefa

###  Testando Post e Put
Ao usar o Postman,após criar uma nova requisição HTTP, dentro da aba Body defina como 'raw' e defina o `Content-Type` como `application/json`.  
Use o JSON abaixo como corpo para editar ou inserir.

```
{
  "title": "",
  "description": "",
  "status": ""
}
```


### Exemplo prático:
- Exclusão do elemento cujo ID=10:
```
DELETE http://localhost:8080/api/tasks/10
```
- Edição dos dados do elemento cujo ID=10:
```
PUT http://localhost:8080/api/tasks/10
{
  "title": "titulo editado",
  "description": "descricao editada",
  "status": "concluída"
}

```

---




## Autor

Desenvolvido por **Bernardo de Lima da Silva**  
[GitHub: @bernardobernardo23](https://github.com/bernardobernardo23)

---


