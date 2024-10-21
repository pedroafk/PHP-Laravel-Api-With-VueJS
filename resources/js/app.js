import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import ReservationsTable from './components/ReservationsTable.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';

const routes = [
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/reservations', component: ReservationsTable, meta: { requiresAuth: true } },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('authToken'); 

    if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
        next('/login'); 
    } else {
        next();
    }
});

const app = createApp({});
app.use(router); 
app.component('reservations-table', ReservationsTable);
app.mount('#app');
