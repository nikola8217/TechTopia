<template>
    <footer v-if="!role_id || (role_id && role_id === '1')" class="mt-100 overflow-hidden" >
        <div class="footer-bottom bg-4">
            <div class="container">
                <div
                    class="footer-bottom-inner d-flex flex-wrap justify-content-md-between justify-content-center align-items-center">
                    <ul class="footer-bottom-menu list-unstyled d-flex flex-wrap align-items-center mb-0">
                        <li class="footer-menu-item"><a :href="$router.resolve({name: 'home'}).href" class="nav-link">Home</a></li>
                        <li class="footer-menu-item"><a :href="$router.resolve({name: 'about'}).href" class="nav-link">About</a></li>
                        <li class="footer-menu-item"><a :href="$router.resolve({name: 'products'}).href" class="nav-link">Products</a></li>
                        <li class="footer-menu-item"><a :href="$router.resolve({name: 'blog'}).href" class="nav-link">Blog</a></li>
                        <li class="footer-menu-item"><a :href="$router.resolve({name: 'contact'}).href" class="nav-link">Contact</a></li>
                    </ul>
                    <p class="copyright footer-text">©<span class="current-year"></span> Nikola Zivkovic</p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    data() {
        return {
            role_id: localStorage.getItem('role_id') ? localStorage.getItem('role_id') : null
        }
    },
}
</script>