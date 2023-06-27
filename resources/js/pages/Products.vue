<template>
  <div>
    <div class="collection mt-100">
      <div class="container">
        <div class="row">
          <CategorySidebar :categories="categories" :brands="brands" @filters-updated="getProducts" />
          <ProductList :products="products" @filters-updated="getProducts" />
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ProductList from '../components/products/ProductList.vue';
import CategorySidebar from '../components/products/CategorySidebar.vue';
import axios from 'axios';

export default {
  components: {
    ProductList,
    CategorySidebar
  },
  mounted() {
    this.getCategories();
    this.getBrands();
    this.getProducts();
  },
  data() {
    return {
      categories: [],
      brands: [],
      products: []
    }
  },
  methods: {
    async getCategories() {
      await axios.get('/api/categories')
          .then(response => {
              this.categories = response.data.categories;
          })
          .catch(error => {
              console.log(error);
          });
    },

    async getBrands() {
      await axios.get('/api/brands')
          .then(response => {
              this.brands = response.data.brands;
          })
          .catch(error => {
              console.log(error);
          });
    },

    async getProducts(filterParams) {
      await axios.get('/api/products', { params: filterParams })
          .then(response => {
              this.products = response.data.products;
          })
          .catch(error => {
              console.log(error);
          });
    },
  }
}
</script>

