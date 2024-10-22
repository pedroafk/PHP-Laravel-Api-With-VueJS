# Laravel & Vue.js Reservation System

Este é um sistema de reservas construído com Laravel no backend e Vue.js no frontend. Ele permite criar, editar, excluir e listar reservas, além de oferecer autenticação de usuários.

## Requisitos

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- MySQL (ou outro banco de dados relacional)
- MongoDB (opcional)
- Laravel 11.x
- Vue.js 3.x

## Instalação

### 1. Clonar o Repositório

Clone o repositório do projeto:

```bash
git clone https://github.com/pedroafk/PHP-Laravel-API.git
cd PHP-Laravel-API
```

### 2. Instalar Dependências

Instale as dependências do Laravel:

```bash
composer install
```

Em seguida, instale as dependências do frontend:

```bash
npm install
```

### 3. Configurar o Arquivo `.env`

Copie o arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

Edite o arquivo `.env` e configure as variáveis de banco de dados e outras opções:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=booking_system 
DB_USERNAME=root          
DB_PASSWORD=mysql    
```

### 4. Gerar a Chave da Aplicação

```bash
php artisan key:generate
```

### 5. Executar as Migrações

Crie as tabelas necessárias executando as migrações:

```bash
php artisan migrate
```

### 6. Compilar os Arquivos de Frontend

Compile os assets do Vue.js:

```bash
npm run dev
```

### 7. Iniciar o Servidor de Desenvolvimento

Inicie o servidor Laravel:

```bash
php artisan serve
```

Agora você pode acessar a aplicação em `http://localhost:8000`.

## Rotas da API

As seguintes rotas de API estão disponíveis:

### Autenticação

- `POST /login` - Login de usuário
- `POST /register` - Registro de usuário
- `GET /api/csrf-token` - Obter o token CSRF

### Reservas

Essas rotas estão protegidas pelo middleware `auth` e devem ser acessadas apenas por usuários autenticados.

- `GET /api/reservations` - Listar todas as reservas
- `GET /api/reservations/{id}` - Obter detalhes de uma reserva específica
- `POST /api/reservations` - Criar uma nova reserva
- `PUT /api/reservations/{id}` - Atualizar uma reserva existente
- `DELETE /api/reservations/{id}` - Excluir uma reserva

### Rotas de Interface

- `GET /login` - Exibe a página de login
- `GET /reservations` - Exibe a página de reservas (requer autenticação)

### Redirecionamento

- `GET /{any}` - Redireciona para a página de login se a rota não for encontrada

---

Com essas etapas, você terá o sistema de reservas configurado e funcionando.
