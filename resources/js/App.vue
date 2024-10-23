<template>
    <div>
      <h1>Welcome to Your Vue App</h1>
     <to-do-app></to-do-app>
    </div>
  </template>

  <script>
import ToDoApp from './components/ToDoApp.vue';
  export default {
    components: { ToDoApp },
    name: 'App',
  };
  </script>
  <style scoped>
  /* Your styles here */
  </style>