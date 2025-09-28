# SystemCondominio 🏢

Sistema de gestão de condomínios desenvolvido com **Laravel** 🟣 e **Vue.js** 🟢, utilizando **Inertia.js** para integração backend/frontend, com foco em administração de moradores, unidades, veículos e entregas. O projeto também utiliza **Tailwind CSS**  🎨 para um front-end moderno e responsivo.

## Autor 👨‍💻

Desenvolvido por **Iago Sousa Miranda**.  
GitHub: [iagosm](https://github.com/iagosm) 🔗  
LinkedIn: [iagosm](https://www.linkedin.com/in/iagosm/) 🔗

---

## Tecnologias e Stacks

- **Backend:** Laravel 10 🟣  
- **Frontend:** Vue 3 + Inertia.js 🟢  
- **Autenticação:** Laravel Breeze (API + Sanctum) 🔐  
- **Banco de dados:** MySQL 🗄️  
- **Estilização:** Tailwind CSS 🎨  
- **Build & Dev:** Vite.js ⚡  
- **Controle de versão:** Git + GitHub 🐙  

---

## Funcionalidades Principais

### Gestão de Moradores 🧑‍🤝‍🧑
- Cadastro e gerenciamento de moradores
- Associação de moradores a unidades
- Tipos de moradores: proprietário, inquilino e visitante

### Gestão de Unidades 🏘️
- Cadastro de unidades do condomínio (apartamento, loft, casa, vila)
- Blocos e unidades
- Associação de proprietário às unidades

### Controle de Veículos 🚗
- Cadastro de veículos por morador
- Controle de entradas e saídas

### Gestão de Entregas 📦
- Registro de entregas recebidas para os moradores
- Controle de quem entregou, quem recebeu e quando

### Autenticação e Permissões 🔐
- Login e registro de usuários
- Diferenciação de usuários comuns e administradores
- Controle de acesso via Laravel Breeze + Sanctum

### Funcionalidades Extras ✨
- Sistema de notificações internas 🔔
- Dashboard com indicadores e gráficos 📊
- Layout responsivo utilizando Tailwind CSS 🎨
- Sistema modular para fácil adição de novas funcionalidades ⚙️

---

## Estrutura do Projeto

```
resources/
└─ js/
   ├─ pages/
   │  ├─ Dashboard.vue
   │  └─ Users/
   │     ├─ Index.vue
   │     ├─ Create.vue
   │     ├─ Edit.vue
   │     └─ Show.vue
   ├─ components/
   │  ├─ NavMain.vue
   │  ├─ NavFooter.vue
   │  └─ NavUser.vue
   └─ composables/
```

- **pages/** → Componentes Inertia.js correspondentes às rotas  
- **components/** → Componentes reutilizáveis  
- **composables/** → Funções e hooks personalizados  

---

## Como Rodar o Projeto Localmente

1. Clone o repositório:

```bash
git clone https://github.com/iagosousamiranda/systemCondominio.git
cd systemCondominio
```

2. Instale as dependências PHP e Node:

```bash
composer install
npm install
```

3. Configure o arquivo `.env` (ex: banco de dados, URL):

```bash
cp .env.example .env
php artisan key:generate
```

4. Rode as migrações:

```bash
php artisan migrate
```

5. Inicie o servidor:

```bash
php artisan serve
npm run dev
```

6. Acesse o projeto no navegador:  
```
http://localhost:8000
```

---

## Licença ⚖️

Este projeto está licenciado sob a licença MIT.