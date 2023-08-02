<template>
    <div class="cart-page mt-100" style="margin-bottom: 100px">
        <div class="container">
            <div class="cart-page-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <table class="cart-table w-100">
                            <thead>
                                <tr>
                                <th class="cart-caption heading_18">Product</th>
                                <th class="cart-caption heading_18"></th>
                                <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                <th class="cart-caption text-end heading_18">Price</th>
                                </tr>
                            </thead>
                
                            <tbody>
                                <tr class="cart-item" v-for="(product, index) in this.products" :key="index">
                                    <td class="cart-item-media">
                                        <div class="mini-img-wrapper">
                                            <img class="mini-img" :src="product.first_img" alt="img">
                                        </div>                                    
                                    </td>
                                    <td class="cart-item-details">
                                        {{ product.name }}                                
                                    </td>
                                    <td class="cart-item-details" style="text-align: center">
                                        {{ product.quantity }}                                 
                                    </td>
                                    <td class="cart-item-details" style="text-align: right">
                                        {{ product.total_price }} RSD                                
                                    </td>                      
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ProductList',
    mounted() {
        this.getProducts();
    },
    data() {
        return {
            order_id: this.$route.params.id,
            products: []
        }
    },
    methods: {
        async getProducts() {
            await axios.get(`/api/orderProducts/${this.order_id}`)
                .then(response => {
                    this.products = response.data.products;
                    console.log(this.products, 213);
                }).catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>