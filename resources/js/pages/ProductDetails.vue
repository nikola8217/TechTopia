<template>
  <div>
    <Details />
    <SimilarProducts />
  </div>
</template>

<script>
import Details from '../components/products/Details.vue';
import SimilarProducts from '../components/products/SimilarProducts.vue';

export default {
  components: {
    Details,
    SimilarProducts
  }
}
</script>

