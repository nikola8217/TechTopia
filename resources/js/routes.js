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
import Checkout from './pages/Checkout.vue';
import Orders from './pages/manager/Orders.vue';
import OrderDetails from './pages/manager/OrderDetails.vue';
import Profile from './pages/Profile.vue';
import NotFound from './pages/NotFound.vue';
import { checkIsAuth, checkIsGuest, checkIsAdmin, checkIsManager, checkIsGuestOrUser, checkIsUserOrManager } from './protection.js';

const routes = [
  {
    path: '/',
    component: Home,
    name: 'home',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/about',
    component: About,
    name: 'about',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/products',
    component: Products,
    name: 'products',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/productDetails/:id',
    component: ProductDetails,
    name: 'productDetails',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/blog',
    component: Blog,
    name: 'blog',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/blogDetails/:id',
    component: BlogDetails,
    name: 'blogDetails',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/contact',
    component: Contact,
    name: 'contact',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/login',
    component: Login,
    name: 'login',
    beforeEnter: checkIsGuest
  },
  {
    path: '/register',
    component: Register,
    name: 'register',
    beforeEnter: checkIsGuest
  },
  {
    path: '/users',
    component: Users,
    name: 'users',
    beforeEnter: checkIsAdmin
  },
  {
    path: '/usersForm/:id',
    component: UsersForm,
    name: 'usersForm',
    props: true,
    beforeEnter: checkIsAdmin
  },
  {
    path: '/categories',
    component: Categories,
    name: 'categories',
    beforeEnter: checkIsAdmin
  },
  {
    path: '/categoriesForm/:id?',
    component: CategoriesForm,
    name: 'categoriesForm',
    beforeEnter: checkIsAdmin
  },
  {
    path: '/brands',
    component: Brands,
    name: 'brands',
    beforeEnter: checkIsAdmin
  },
  {
    path: '/brandsForm/:id?',
    component: BrandsForm,
    name: 'brandsForm',
    beforeEnter: checkIsAdmin
  },
  {
    path: '/productsAdmin/:id',
    component: ProductsAdmin,
    name: 'productsAdmin',
    beforeEnter: checkIsAdmin
  },
  {
    path: '/productsForm/:id/:product_id?',
    component: ProductsForm,
    name: 'productsForm',
    beforeEnter: checkIsAdmin
  },
  {
    path: '/blogsManager',
    component: BlogsManager,
    name: 'blogsManager',
    beforeEnter: checkIsManager
  },
  {
    path: '/blogsForm/:id?',
    component: BlogsForm,
    name: 'blogsForm',
    beforeEnter: checkIsManager
  },
  {
    path: '/cart',
    component: Cart,
    name: 'cart',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/checkout',
    component: Checkout,
    name: 'checkout',
    beforeEnter: checkIsGuestOrUser
  },
  {
    path: '/orders',
    component: Orders,
    name: 'orders',
    beforeEnter: checkIsManager
  },
  {
    path: '/orders/:id',
    component: OrderDetails,
    name: 'orderDetails',
    beforeEnter: checkIsUserOrManager
  },
  {
    path: '/profile',
    component: Profile,
    name: 'profile',
    beforeEnter: checkIsAuth
  },
  {
    path: '/:catchAll(.*)',
    component: NotFound,
    name: 'notFound',
  },
];

export default routes;
