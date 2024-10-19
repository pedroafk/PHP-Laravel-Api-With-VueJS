<template>
    <div class="p-5">
        <h2 class="text-2xl font-bold mb-4">Reservations</h2>
        <button @click="showForm = true" class="mb-4 bg-blue-500 text-white py-2 px-4 rounded">New Reservation</button>

        <div v-if="showForm" class="mb-4 p-4 border border-gray-300 rounded">
            <h3 class="text-lg font-semibold mb-2">Add New Reservation</h3>
            <form @submit.prevent="addReservation">
                <div class="mb-2">
                    <label for="name" class="block">Name:</label>
                    <input type="text" v-model="newReservation.name" required class="border rounded w-full py-2 px-3">
                </div>
                <div class="mb-2">
                    <label for="email" class="block">Email:</label>
                    <input type="email" v-model="newReservation.email" required class="border rounded w-full py-2 px-3">
                </div>
                <div class="mb-2">
                    <label for="date" class="block">Date:</label>
                    <input type="date" v-model="newReservation.date" required class="border rounded w-full py-2 px-3">
                </div>
                <div class="mb-2">
                    <label for="time" class="block">Time:</label>
                    <input type="time" v-model="newReservation.time" required class="border rounded w-full py-2 px-3">
                </div>
                <div class="mb-2">
                    <label for="number_of_guests" class="block">Number of Guests:</label>
                    <input type="number" v-model="newReservation.number_of_guests" required class="border rounded w-full py-2 px-3">
                </div>
                <button type="submit" class="mt-2 bg-green-500 text-white py-2 px-4 rounded">Add Reservation</button>
                <button type="button" @click="showForm = false" class="mt-2 bg-red-500 text-white py-2 px-4 rounded">Cancel</button>
            </form>
        </div>

        <table class="min-w-full bg-white border border-gray-200 mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">ID</th>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Email</th>
                    <th class="py-2 px-4 border">Date</th>
                    <th class="py-2 px-4 border">Time</th>
                    <th class="py-2 px-4 border">Number of Guests</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="reservation in reservations" :key="reservation.id">
                    <td class="py-2 px-4 border">{{ reservation.id }}</td>
                    <td class="py-2 px-4 border">{{ reservation.name }}</td>
                    <td class="py-2 px-4 border">{{ reservation.email }}</td>
                    <td class="py-2 px-4 border">{{ reservation.date }}</td>
                    <td class="py-2 px-4 border">{{ reservation.time }}</td>
                    <td class="py-2 px-4 border">{{ reservation.number_of_guests }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            reservations: [],
            showForm: false,
            csrfToken: '', // Para armazenar o token CSRF
            newReservation: {
                name: '',
                email: '',
                date: '',
                time: '',
                number_of_guests: '',
            },
        };
    },
    mounted() {
        this.fetchReservations();
    },
    methods: {
        // Função para obter o token CSRF
        async fetchCsrfToken() {
            try {
                const response = await fetch('http://localhost:8000/api/csrf-token');
                const data = await response.json();
                this.csrfToken = data.csrf_token;
            } catch (error) {
                console.error('Error fetching CSRF token:', error);
            }
        },

        // Função para buscar as reservas
        async fetchReservations() {
            try {
                const response = await fetch('/api/reservations');
                this.reservations = await response.json();
            } catch (error) {
                console.error('Error fetching reservations:', error);
            }
        },

        // Função para adicionar uma nova reserva
        async addReservation() {
            try {

                // Primeiro, obtenha o token CSRF
                if (!this.csrfToken) {
                    await this.fetchCsrfToken();
                }

                // Enviar a requisição de POST
                const response = await fetch('http://127.0.0.1:8000/api/reservations', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken,  // Enviar o token CSRF aqui
                        'Accept': 'application/json',    // Assegura que o Laravel reconheça o formato da requisição
                    },
                    body: JSON.stringify(this.newReservation),
                });

                console.log(response.ok);


                if (response.ok) {
                    this.newReservation = { name: '', email: '', date: '', time: '', number_of_guests: '' }; // Limpa o formulário
                    this.showForm = false; // Fecha o formulário
                    this.fetchReservations(); // Recarrega as reservas
                } else {
                    console.error('Failed to add reservation:', response.statusText);
                }
            } catch (error) {
                console.error('Error adding reservation:', error);
    }
}

    },
};
</script>

<style scoped>
/* Estilo opcional para o componente */
</style>
