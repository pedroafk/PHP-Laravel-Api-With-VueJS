<template>
    <div class="login-container flex flex-col items-center justify-center h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form @submit.prevent="login">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input
                        type="email"
                        v-model="email"
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                    />
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha:</label>
                    <input
                        type="password"
                        v-model="password"
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition duration-200"
                >
                    Entrar
                </button>
            </form>
            <p v-if="errorMessage" class="mt-4 text-red-500 text-sm text-center">{{ errorMessage }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            password: '',
            errorMessage: ''
        };
    },
    methods: {
        async login() {
            try {
                const response = await axios.post('/login', {
                    email: this.email,
                    password: this.password
                });
                console.log(response.data.message);
                // Redirecionar ou realizar ações após login bem-sucedido
            } catch (error) {
                this.errorMessage = error.response.data.message || 'Erro ao fazer login';
            }
        }
    }
};
</script>

<style scoped>
/* Você pode adicionar estilos personalizados aqui, se necessário */
</style>
