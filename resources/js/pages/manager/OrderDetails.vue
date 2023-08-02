<template>
  <div>
    <Card />   
    <ProductList /> 
  </div>
</template>

<script>
import Card from '../../components/orders/Card.vue';
import ProductList from '../../components/orders/ProductList.vue';

export default {
  components: {
    Card,
    ProductList
  }
}
</script>