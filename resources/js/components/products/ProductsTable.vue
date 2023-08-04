<template>
    <div class="cart-page mt-100" style="margin-bottom: 100px">
        <div class="container">
            <div class="cart-page-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="mb-5">
                            <button class="btn btn-success" @click="createProduct">Create Product</button>
                        </div>
                        <table class="cart-table w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Price (RSD)</th>
                                    <th>Discount (%)</th>
                                    <th>Price with discount (RSD)</th>
                                    <th style="text-align: right">Actions</th>
                                </tr>
                            </thead>
                
                            <tbody>
                                <tr class="cart-item" v-for="(product, index) in this.products" :key="index">
                                    <td>
                                        {{ product.product_id }}
                                    </td>
                                    <td>
                                        {{ product.name }}                                 
                                    </td>
                                    <td>
                                        {{ product.brand_name }}                                    
                                    </td>
                                    <td>
                                        {{ product.price }}                                    
                                    </td>
                                    <td>
                                        {{ product.discount }}                                    
                                    </td>
                                    <td>
                                        {{ product.price_with_discount }}                                    
                                    </td>
                                    <td>
                                        <div class="btn-group" style="float: right;">
                                            <button class="btn btn-primary" style="margin-right: 5px;" @click="editProduct(product.product_id)">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" @click="deleteProduct(product.product_id)">
                                                Delete
                                            </button>
                                        </div>
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
import Swal from 'sweetalert2';

export default {
    name: "ProductsTable",
    mounted() {
        this.getProducts(this.$route.params.id);
    },
    data() {
        return {
            products: []
        }
    },
    methods: {
        async getProducts() {
            await axios.get(`/api/productsByCategory/${this.$route.params.id}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            })
                .then(response => {
                    this.products = response.data.products;
                    this.products = response.data.products.map(product => ({
                        ...product,
                        price: product.price.toFixed(2),
                        price_with_discount: product.price_with_discount.toFixed(2)
                    }));
                })
                .catch(error => {
                    console.log(error);
                });
        },

        createProduct() {
            window.location.href = `/productsForm/${this.$route.params.id}`;
        },

        editProduct(id) {
            window.location.href = `/productsForm/${this.$route.params.id}/${id}`; 
        },

        async deleteProduct(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/products/${id}`, {
                        headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                        }
                    })
                    .then(response => {
                        Swal.fire(
                            'Deleted!',
                            response.data.success,
                            'success'
                        );
                        this.getProducts(this.$route.params.id);
                    })
                    .catch(error => {
                        console.error(error);
                    });
                }
            });
        }
    }
}
</script>