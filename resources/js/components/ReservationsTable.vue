<template>
    <div class="p-5">
        <h2 class="text-2xl font-bold mb-4">Reservations</h2>
        <table class="min-w-full bg-white border border-gray-200">
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
        };
    },
    mounted() {
        this.fetchReservations();
    },
    methods: {
        async fetchReservations() {
            try {
                const response = await fetch('/api/reservations');
                this.reservations = await response.json();
            } catch (error) {
                console.error('Error fetching reservations:', error);
            }
        },
    },
};
</script>

<style scoped>
/* Adicione qualquer estilo específico para o componente aqui, se necessário */
</style>
