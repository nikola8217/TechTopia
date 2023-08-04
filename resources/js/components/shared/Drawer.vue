<template>
      <!-- drawer menu start -->
        <div class="offcanvas offcanvas-start d-flex d-lg-none" tabindex="-1" id="drawer-menu">
            <div class="offcanvas-wrapper">
                <div class="offcanvas-header border-btm-black">
                    <h5 class="drawer-heading">TechTopia</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0 d-flex flex-column justify-content-between">
                    <nav class="site-navigation">
                        <ul v-if="role_id && role_id === '1'" class="main-menu list-unstyled">
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
                                <a :href="$router.resolve({name: 'profile'}).href" class="nav-link">Profile</a>
                            </li>
                            <li class="menu-list-item nav-item">
                                <a @click="logout" class="nav-link">Logout</a>
                            </li>
                        </ul>
                        <ul v-else-if="role_id && role_id === '2'"  class="main-menu list-unstyled">
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
                        <ul v-else-if="role_id && role_id === '3'"  class="main-menu list-unstyled">
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
                        <ul v-else class="main-menu list-unstyled">
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
            </div>
        </div>
        <!-- drawer menu end -->
</template>

<script>
export default {
    name: 'Drawer',
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