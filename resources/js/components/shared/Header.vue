<template>
    <div>
        <Navbar />
        <Drawer />
        <!-- <CartDrawer /> -->
    </div>


</template>

<script>

import Navbar from './Navbar.vue';
import Drawer from './Drawer.vue';
// import CartDrawer from './CartDrawer.vue';

export default {
    name: 'Header',
    components: {
        Navbar,
        Drawer,
        // CartDrawer
    }
}
</script>