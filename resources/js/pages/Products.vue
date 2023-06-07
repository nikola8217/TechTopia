<template>
  <div>
    <div class="collection mt-100">
      <div class="container">
        <div class="row">
          <CategorySidebar />
          <ProductList />
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ProductList from '../components/products/ProductList.vue';
import CategorySidebar from '../components/products/CategorySidebar.vue';

export default {
  components: {
    ProductList,
    CategorySidebar
  }
}
</script>