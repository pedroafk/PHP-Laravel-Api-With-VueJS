<template>
    <div class="register-container flex flex-col items-center justify-center h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Criar Conta</h2>
            <form @submit.prevent="register">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome:</label>
                    <input
                        type="text"
                        v-model="name"
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                    />
                </div>
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
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha:</label>
                    <input
                        type="password"
                        v-model="passwordConfirmation"
                        required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-2 rounded-md hover:bg-blue-700 transition duration-200"
                >
                    Criar Conta
                </button>
            </form>
            <p v-if="errorMessage" class="mt-4 text-red-500 text-sm text-center">{{ errorMessage }}</p>
            <p class="mt-4 text-sm text-center">
                Já tem uma conta? 
                <router-link to="/login" class="text-blue-600 hover:underline">Faça login</router-link>
            </p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            passwordConfirmation: '',
            errorMessage: '',
            errors: [] 
        };
    },
    methods: {
    register() {
        const payload = {
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.passwordConfirmation,
        };
        console.log('Dados enviados:', payload);

        axios.post('http://127.0.0.1:8000/register', payload)
            .then(response => {
                console.log('Registro realizado com sucesso!', response.data);
                this.$router.push('/login');
            })
            .catch(error => {
                if (error.response) {
                    console.log('Erro:', error.response.data);
                    this.errors = error.response.data.errors;
                } else {
                    console.log('Erro de rede:', error);
                }
            });
    }
}

};
</script>

<style scoped>
/* Você pode adicionar estilos personalizados aqui, se necessário */
</style>
