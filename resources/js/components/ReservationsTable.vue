<template>
    <div>
      <h1>Reservations</h1>
      <table v-if="reservations.length">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Reservation Date</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="reservation in reservations" :key="reservation.id">
            <td>{{ reservation.id }}</td>
            <td>{{ reservation.name }}</td>
            <td>{{ reservation.email }}</td>
            <td>{{ reservation.date }}</td>
          </tr>
        </tbody>
      </table>
      <p v-else>No reservations available.</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        reservations: [] // Armazena as reservas
      };
    },
    mounted() {
      this.fetchReservations(); // Chama a função para buscar reservas quando o componente é montado
    },
    methods: {
      async fetchReservations() {
        try {
          const response = await fetch('/api/reservations'); // Faz a requisição para a API
          const data = await response.json(); // Converte a resposta para JSON
          this.reservations = data; // Atualiza a lista de reservas
        } catch (error) {
          console.error('Error fetching reservations:', error); // Exibe erro no console
        }
      }
    }
  };
  </script>
  
  <style scoped>
  /* Adicione estilos se necessário */
  </style>
  