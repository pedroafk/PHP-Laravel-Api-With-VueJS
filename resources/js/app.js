// resources/js/app.js
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import ReservationsTable from './components/ReservationsTable.vue';
import Login from './components/Login.vue'; // Importar o componente de login

// Definir as rotas
const routes = [
    { path: '/login', component: Login }, // Rota para a tela de login
    { path: '/reservations', component: ReservationsTable, meta: { requiresAuth: true } }, // Rota para a tabela de reservas
];

// Criar uma instância do router
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Middleware para verificar a autenticação
router.beforeEach((to, from, next) => {
    // Aqui você deve verificar se o usuário está autenticado (por exemplo, verificando um token no localStorage)
    const isAuthenticated = !!localStorage.getItem('authToken'); // Altere conforme sua lógica de autenticação

    if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
        next('/login'); // Redireciona para a tela de login se não estiver autenticado
    } else {
        next(); // Permite a navegação
    }
});

// Criar e montar a aplicação
const app = createApp({});
app.use(router); // Usar o router
app.mount('#app'); // Montagem única
