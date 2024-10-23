<template>
    <div>
      <h1>To-Do List</h1>
      <input v-model="newTodo" @keyup.enter="createTodo" placeholder="New To-Do" />
      <ul>
        <li v-for="todo in todos" :key="todo.id">
          <input type="checkbox" v-model="todo.completed" @change="updateTodo(todo)" />
          <span :class="{ 'completed': todo.completed }">{{ todo.title }}</span>
          <button @click="deleteTodo(todo.id)">Delete</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        todos: [],
        newTodo: ''
      };
    },
    mounted() {
      this.getTodos();
    },
    methods: {
      getTodos() {
        axios.get('/api/todos')
          .then(response => this.todos = response.data)
          .catch(error => console.log(error));
      },
      createTodo() {
        if (this.newTodo.trim() === '') return;
        axios.post('/api/todos', { title: this.newTodo })
          .then(response => {
            this.todos.push(response.data);
            this.newTodo = '';
          })
          .catch(error => console.log(error));
      },
      updateTodo(todo) {
        axios.put(`/api/todos/${todo.id}`, { completed: todo.completed })
          .catch(error => console.log(error));
      },
      deleteTodo(id) {
        axios.delete(`/api/todos/${id}`)
          .then(() => {
            this.todos = this.todos.filter(todo => todo.id !== id);
          })
          .catch(error => console.log(error));
      }
    }
  };
  </script>
  
  <style>
  .completed {
    text-decoration: line-through;
  }
  </style>
  