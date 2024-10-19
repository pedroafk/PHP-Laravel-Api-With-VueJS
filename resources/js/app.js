// resources/js/app.js
import { createApp } from 'vue';
import ReservationsTable from './components/ReservationsTable.vue';

const app = createApp({});
app.component('reservations-table', ReservationsTable);
app.mount('#app'); // Montagem única
