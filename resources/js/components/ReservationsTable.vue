<template>
    <div class="p-5">
        <h2 class="text-2xl font-bold mb-4">Reservations</h2>
        <button @click="showForm = true" class="mb-4 bg-blue-500 text-white py-2 px-4 rounded">New Reservation</button>

        <div v-if="showForm" class="mb-4 p-4 border border-gray-300 rounded">
            <h3 class="text-lg font-semibold mb-2">Add New Reservation</h3>
            <form @submit.prevent="addReservation" method="POST">
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
import axios from 'axios';

export default {
    data() {
        return {
            reservations: [],
            showForm: false,
            csrfToken: '',
            newReservation: {
                name: 'teste',
                email: 'teste@gmail.com',
                date: '2024-10-18',
                time: '12:00:00',
                number_of_guests: '2',
            },
        };
    },
    mounted() {
        this.fetchReservations();
        this.fetchCsrfToken();
    },
    methods: {
        async fetchCsrfToken() {
            try {
                const response = await axios.get('http://localhost:8000/api/csrf-token', {
                    withCredentials: true,
                });
                this.csrfToken = response.data.csrf_token;
            } catch (error) {
                console.error('Error fetching CSRF token:', error);
            }
        },

        async fetchReservations() {
            try {
                const response = await axios.get('/api/reservations',{
                    withCredentials: true
                });
                this.reservations = response.data;
            } catch (error) {
                console.error('Error fetching reservations:', error);
            }
        },

        async addReservation() {
            console.log('Adding reservation...');

            try {
                if (!this.csrfToken) {
                    await this.fetchCsrfToken();
                }

                
                const response = await axios.post('http://127.0.0.1:8000/api/reservations', this.newReservation, {
                    headers: {
                        'X-CSRF-TOKEN': this.csrfToken,
                        'Accept': 'application/json',
                    },
                    withCredentials: true,
                });

                console.log('Response:', response);

                if (response.status === 200) {
                    this.newReservation = { name: '', email: '', date: '', time: '', number_of_guests: '' };
                    this.showForm = false;
                    this.fetchReservations();
                } else {
                    console.error('Failed to add reservation:', response.statusText);
                }
            } catch (error) {
                console.log('Full error object:', error);
            }
        }
    },
};
</script>

<style scoped>
</style>
