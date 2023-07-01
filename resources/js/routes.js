import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Products from './pages/Products.vue';
import ProductDetails from './pages/ProductDetails.vue';
import Blog from './pages/Blog.vue';
import BlogDetails from './pages/BlogDetails.vue';
import Contact from './pages/Contact.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import Users from './pages/admin/Users.vue';
import Categories from './pages/admin/Categories.vue';
import UsersForm from './pages/admin/forms/Users.vue';
import CategoriesForm from './pages/admin/forms/Categories.vue';
import Brands from './pages/admin/Brands.vue';
import BrandsForm from './pages/admin/forms/Brands.vue';
import ProductsAdmin from './pages/admin/Products.vue';
import ProductsForm from './pages/admin/forms/Products.vue';
import BlogsManager from './pages/manager/Blogs.vue';
import BlogsForm from './pages/manager/forms/Blogs.vue';
import Cart from './pages/Cart.vue';

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
    path: '/productDetails/:id',
    component: ProductDetails,
    name: 'productDetails'
  },
  {
    path: '/blog',
    component: Blog,
    name: 'blog'
  },
  {
    path: '/blogDetails/:id',
    component: BlogDetails,
    name: 'blogDetails'
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
  {
    path: '/users',
    component: Users,
    name: 'users'
  },
  {
    path: '/usersForm/:id',
    component: UsersForm,
    name: 'usersForm',
    props: true
  },
  {
    path: '/categories',
    component: Categories,
    name: 'categories'
  },
  {
    path: '/categoriesForm/:id?',
    component: CategoriesForm,
    name: 'categoriesForm',
  },
  {
    path: '/brands',
    component: Brands,
    name: 'brands'
  },
  {
    path: '/brandsForm/:id?',
    component: BrandsForm,
    name: 'brandsForm',
  },
  {
    path: '/productsAdmin/:id',
    component: ProductsAdmin,
    name: 'productsAdmin',
  },
  {
    path: '/productsForm/:id/:product_id?',
    component: ProductsForm,
    name: 'productsForm',
  },
  {
    path: '/blogsManager',
    component: BlogsManager,
    name: 'blogsManager'
  },
  {
    path: '/blogsForm/:id?',
    component: BlogsForm,
    name: 'blogsForm'
  },
  {
    path: '/cart',
    component: Cart,
    name: '/cart'
  },
];

export default routes;
