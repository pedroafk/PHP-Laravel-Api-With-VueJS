<template>
    <div>
      <p>{{ message }}</p>
      <button @click="changeMessage">Click me</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        message: "Hello World from Vue.js!"
      };
    },
    methods: {
      changeMessage() {
        this.message = "You clicked the button!";
      }
    }
  };
  </script>
  
  <style scoped>
  /* Adicione seus estilos aqui */
  </style>
  