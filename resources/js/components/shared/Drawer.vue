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
                        <ul class="main-menu list-unstyled">
                           
                           <li class="menu-list-item nav-item">
                                <router-link to="/" class="nav-link">Home</router-link>
                            </li>

                            <li class="menu-list-item nav-item">
                                <router-link to="/about" class="nav-link">About</router-link>
                            </li>

                            <li class="menu-list-item nav-item">
                                <router-link to="/products" class="nav-link">Products</router-link>
                            </li>

                            <li class="menu-list-item nav-item">
                                <router-link to="/blog" class="nav-link">Blog</router-link>
                            </li>
                            
                            <li class="menu-list-item nav-item">
                                <router-link to="/contact" class="nav-link">Contact</router-link>
                            </li>
                            
                            <li class="menu-list-item nav-item">
                                <router-link to="/login" class="nav-link">Login</router-link>
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
    name: 'Drawer'
}
</script>