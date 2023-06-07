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
    name: 'Drawer'
}
</script>