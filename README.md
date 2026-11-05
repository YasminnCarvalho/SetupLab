# SetupLab

## 1. Sobre o projeto

O SetupLab é uma aplicação web desenvolvida para auxiliar na montagem e configuração de computadores personalizados. O sistema disponibiliza um catálogo de componentes e recursos para visualizar e organizar montagens, facilitando a escolha das peças que compõem um computador.

O projeto foi desenvolvido utilizando Laravel e PostgreSQL, com o banco de dados hospedado na plataforma Neon.

## 2. Tecnologias utilizadas

- PHP 8.3 ou superior
- Laravel 13
- PostgreSQL
- Neon
- JavaScript
- Vite 8
- Tailwind CSS 4
- PHPUnit 12

## 3. Funcionalidades

- Consulta e gerenciamento de componentes;
- Cadastro, edição e exclusão de componentes pela API;
- Organização dos componentes por categorias;
- Catálogo de componentes;
- Interface para montagem de computadores;
- Gerenciamento de montagens;
- Integração com banco de dados PostgreSQL.

## 4. Instalação e execução

### Pré-requisitos

- PHP 8.3 ou superior;
- Composer;
- Node.js e npm;
- Acesso ao banco de dados PostgreSQL no Neon.

### Clonar o repositório

```bash
git clone https://github.com/YasminnCarvalho/SetupLab.git
cd SetupLab
```

### Instalar as dependências

```bash
composer install
npm install
```

### Configurar o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### Configurar o banco PostgreSQL

No arquivo `.env`, configure os dados de conexão disponibilizados pelo Neon:

```env
DB_CONNECTION=pgsql
DB_HOST=SEU_HOST
DB_PORT=5432
DB_DATABASE=SEU_BANCO
DB_USERNAME=SEU_USUARIO
DB_PASSWORD=SUA_SENHA
```

Configure o SSL conforme os dados de conexão fornecidos pelo Neon.

Não compartilhe o arquivo `.env`, pois ele contém informações privadas.

### Executar as migrations

```bash
php artisan migrate
```

Para carregar os dados iniciais do catálogo:

```bash
php artisan db:seed --class=CatalogoSetupLabSeeder
```

### Compilar os arquivos do frontend

```bash
npm run build
```

### Iniciar o servidor

```bash
php artisan serve
```

A aplicação poderá ser acessada em `http://127.0.0.1:8000`.

## 5. API de componentes

O projeto possui uma API REST desenvolvida em Laravel para realizar operações de gerenciamento de componentes.

As rotas estão definidas em `routes/api.php`, utilizando `Route::apiResource`.

### Endpoints disponíveis

| Método HTTP | Endpoint | Descrição |
|---|---|---|
| GET | `/api/componentes` | Lista os componentes |
| POST | `/api/componentes` | Cadastra um componente |
| GET | `/api/componentes/{componente}` | Consulta um componente específico |
| PUT/PATCH | `/api/componentes/{componente}` | Atualiza um componente |
| DELETE | `/api/componentes/{componente}` | Exclui um componente |

### Exemplo de cadastro

Requisição: `POST /api/componentes`

```json
{
    "categoria_id": 2,
    "nome": "Processador Ryzen 5",
    "preco": 899.90,
    "estoque": 10
}
```

A API realiza a validação dos dados recebidos e retorna respostas no formato JSON.

## 6. Banco de dados

O banco de dados utilizado no projeto é o PostgreSQL, hospedado no Neon.

A estrutura contempla tabelas para armazenamento de categorias, componentes e montagens, além de seus relacionamentos.

### Recursos implementados

- Chaves primárias e estrangeiras;
- Relacionamentos entre tabelas;
- Índices para otimização de consultas;
- Funções SQL;
- Procedures;
- Triggers.

### Scripts SQL

Os scripts utilizados na implementação dos recursos do banco estão organizados na pasta `database/sql/`:

- `funcoes.sql`: funções do banco de dados;
- `procedures.sql`: procedures implementadas;
- `triggers.sql`: gatilhos responsáveis por executar ações automaticamente em determinadas operações.

## 7. Testes automatizados

O projeto utiliza PHPUnit para execução dos testes automatizados.

Para executar os testes:

```bash
php artisan test
```

Os testes verificam o funcionamento das rotas e das funcionalidades da aplicação.

## 8. Backup e restauração

O projeto contempla procedimentos de backup e restauração do banco de dados PostgreSQL.

A criação e a restauração são realizadas por meio das ferramentas do PostgreSQL, como `pg_dump` e `pg_restore`, utilizando os dados de conexão do banco.

Os arquivos de backup devem ser armazenados com segurança e não devem ser publicados no repositório sem autorização.

## 9. Estrutura do projeto

| Diretório | Finalidade |
|---|---|
| `app/Http/Controllers/` | Controllers da aplicação |
| `app/Http/Controllers/Api/` | Controller responsável pela API |
| `app/Models/` | Models e relacionamentos |
| `app/Services/` | Serviços e regras de negócio |
| `database/migrations/` | Migrations do banco |
| `database/seeders/` | Dados iniciais |
| `database/sql/` | Scripts SQL |
| `resources/views/` | Telas da aplicação |
| `routes/` | Definição das rotas |
| `tests/` | Testes automatizados |

## 10. Repositório

Código-fonte do projeto:

https://github.com/YasminnCarvalho/SetupLab