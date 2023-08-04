<template>
    <div>
        <!-- collection start -->
            <div class="featured-collection mt-100 overflow-hidden">
                <div class="collection-tab-inner">
                    <div class="container">
                        <div class="section-header text-center">
                            <h3 class="section-heading">You may also like</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700" v-for="(product, index) in this.products" :key="index">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <a class="hover-switch" href="">
                                            <img class="secondary-img" :src="product.second_img"
                                                alt="product-img">
                                            <img class="primary-img" :src="product.first_img"
                                                alt="product-img">
                                        </a>

                                        <div class="product-badge">
                                            <span v-if="product.discount > 0" class="badge-label badge-percentage rounded">-{{ product.discount }}%</span>
                                        </div>

                                    </div>
                                    <div class="product-card-details">
                                        
                                        <h3 class="product-card-title">
                                            <a href="collection-left-sidebar.html">{{ product.name }}</a>
                                        </h3>
                                        <div v-if="product.discount > 0" class="product-card-price">
                                            <span class="card-price-regular">{{ product.price_with_discount }} RSD</span>
                                            <span
                                                class="card-price-compare text-decoration-line-through">{{ product.price }} RSD</span>
                                        </div>
                                        <div v-else class="product-card-price">
                                            <span class="card-price-regular">{{ product.price }} RSD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- collection end -->
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'SimilarProducts',
    mounted() {
        this.getProducts();
    },
    data() {
        return {
            products: []
        }
    },
    methods: {
        async getProducts() {
      await axios.get(`/api/randomProducts/${this.$route.params.id}`)
          .then(response => {
              this.products = response.data.products;
              this.products = response.data.products.map(product => ({
                ...product,
                price: product.price.toFixed(2)
              }));
          })
          .catch(error => {
              console.log(error);
          });
    },
    }
}
</script>