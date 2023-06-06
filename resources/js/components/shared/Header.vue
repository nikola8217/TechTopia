<template>
    <div>
        <Navbar />
        <Drawer />
    </div>


</template>

<script>

import Navbar from './Navbar.vue';
import Drawer from './Drawer.vue';

export default {
    name: 'Header',
    components: {
        Navbar,
        Drawer
    }
}
</script>