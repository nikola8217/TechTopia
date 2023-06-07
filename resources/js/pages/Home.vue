<template>
  <div>
    <Corousel />
    <Badges />
    <Promotions />
    <LatestProducts />
    <PopularProducts />
    
  </div>
</template>

<script>
import Corousel from '../components/home/Corousel.vue';
import Badges from '../components/home/Badges.vue';
import PopularProducts from '../components/home/PopularProducts.vue';
import Promotions from '../components/home/Promotions.vue';
import LatestProducts from '../components/home/LatestProducts.vue';

export default {
  components: {
    Corousel,
    Badges,
    PopularProducts,
    Promotions,
    LatestProducts
  }
}
</script>

