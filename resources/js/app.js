import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import routes from './routes';
import Header from './components/shared/Header.vue';

const router = createRouter({
  history: createWebHistory(),
  routes
});

const app = createApp({});

app.component('header-component', Header);

app.use(router);

app.mount('#app');