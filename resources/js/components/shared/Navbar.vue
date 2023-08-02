<template>
    <div>
        <!-- header start -->
        <header class="sticky-header border-btm-black header-1" style="width: 100%">
            <div class="header-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-4 col-4">
                            <div class="header-logo">
                                <a href="index.html" class="logo-main">
                                    <img src="asset/img/logo.png" loading="lazy" alt="bisum">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-block d-none">
                            <nav class="site-navigation">
                                <ul v-if="role_id && role_id === '1'" class="main-menu list-unstyled justify-content-center">
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'home'}).href" class="nav-link">Home</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'about'}).href" class="nav-link">About</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'products'}).href" class="nav-link">Products</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'blog'}).href" class="nav-link">Blog</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'contact'}).href" class="nav-link">Contact</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a @click="logout" class="nav-link">Logout</a>
                                    </li>
                                </ul>
                                <ul v-else-if="role_id && role_id === '2'" class="main-menu list-unstyled justify-content-center">
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'users'}).href" class="nav-link">Users</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'categories'}).href" class="nav-link">Categories</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'brands'}).href" class="nav-link">Brands</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a @click="logout" class="nav-link">Logout</a>
                                    </li>
                                </ul>
                                <ul v-else-if="role_id && role_id === '3'" class="main-menu list-unstyled justify-content-center">
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'blogsManager'}).href" class="nav-link">Blogs</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'orders'}).href" class="nav-link">Orders</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a @click="logout" class="nav-link">Logout</a>
                                    </li>
                                </ul>
                                <ul v-else class="main-menu list-unstyled justify-content-center"> 
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'home'}).href" class="nav-link">Home</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'about'}).href" class="nav-link">About</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'products'}).href" class="nav-link">Products</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'blog'}).href" class="nav-link">Blog</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'contact'}).href" class="nav-link">Contact</a>
                                    </li>
                                    <li class="menu-list-item nav-item">
                                        <a :href="$router.resolve({name: 'login'}).href" class="nav-link">Login</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3 col-md-8 col-8">
                            <div class="header-action d-flex align-items-center justify-content-end">
                                
                                <a class="header-action-item header-cart ms-4" href="#drawer-cart"
                                    data-bs-toggle="offcanvas">
                                    <svg class="icon icon-cart" width="24" height="26" viewBox="0 0 24 26" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
                                            fill="black" />
                                    </svg>
                                </a>

                                <a class="header-action-item header-hamburger ms-4 d-lg-none" href="#drawer-menu"
                                    data-bs-toggle="offcanvas">
                                    <svg class="icon icon-hamburger" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->
        <CartDrawer />
    </div>
</template>

<script>
import CartDrawer from './CartDrawer.vue'

export default {
    name: 'Navbar',
    components: {
        CartDrawer
    },
    computed: {
        showCartDrawer() {
        return this.$route.path !== '/cart';
        }
    },
    data() {
        return {
            role_id: localStorage.getItem('role_id') ? localStorage.getItem('role_id') : null
        }
    },
    methods: {
        logout() {
            localStorage.clear();
            window.location.href = '/';
        }
    }
}
</script>