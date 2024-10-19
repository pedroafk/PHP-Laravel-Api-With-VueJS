// resources/js/app.js
import { createApp } from 'vue';
import ReservationsTable from './components/ReservationsTable.vue';
import Login from './components/Login.vue'; // Importar o componente de login

const app = createApp({});
app.component('reservations-table', ReservationsTable);
app.component('login-component', Login); // Registrar o componente de login
app.mount('#app'); // Montagem única
