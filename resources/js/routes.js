import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Products from './pages/Products.vue';
import Blog from './pages/Blog.vue';
import Contact from './pages/Contact.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';

const routes = [
  {
    path: '/',
    component: Home,
    name: 'home'
  },
  {
    path: '/about',
    component: About,
    name: 'about'
  },
  {
    path: '/products',
    component: Products,
    name: 'products'
  },
  {
    path: '/blog',
    component: Blog,
    name: 'blog'
  },
  {
    path: '/contact',
    component: Contact,
    name: 'contact'
  },
  {
    path: '/login',
    component: Login,
    name: 'login'
  },
  {
    path: '/register',
    component: Register,
    name: 'register'
  },
];

export default routes;
