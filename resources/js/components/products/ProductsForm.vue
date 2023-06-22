<template>
    <div class="checkout-page mt-100">
        <div class="container">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                

                <div class="shipping-address-area">
                    <h2 class="shipping-address-heading pb-1">{{ product_id ? 'Edit Product' : 'Create Product' }}</h2>
                    <div class="shipping-address-form-wrapper">
                            <form class="shipping-address-form common-form" @submit="handleSubmit">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Name</label>
                                        <input type="text" v-model="name" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Brand</label>
                                        <select class="form-select" v-model="brand_id">
                                            <option v-for="brand in brands" :value="brand.id" :key="brand.id" :selected="brand.id === brand_id">
                                                {{ brand.name }}
                                            </option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Price</label>
                                        <input type="number" v-model="price" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">Discount</label>
                                        <input type="number" v-model="discount" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <fieldset>
                                        <label class="label">First image</label>
                                        <input type="text" v-model="first_image" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 mb-5">
                                    <fieldset>
                                        <label class="label">Second image</label>
                                        <input type="text" v-model="second_image" />
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                        <a :href="$router.resolve({name: `products`}).href" class="checkout-page-btn minicart-btn btn-secondary" style="border: 1px solid black">BACK</a>
                                        <button type="submit" class="checkout-page-btn minicart-btn btn-primary">SAVE</button>
                                    </div>
                                </div>
                                
                            </div>

                        </form>
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
    name: "ProductsForm",
    mounted() {
        if (this.product_id) this.getProduct();
        this.getBrands();
    },
    data() {
        return {
            product_id: this.$route.params.product_id ? this.$route.params.product_id : '',
            name: '',
            price: 0,
            discount: 0,
            first_image: '',
            second_image: '',
            brand_id: 1,
            brands: []

        }
    },
    methods: {
        async createProduct(e) {
            await axios.post('/api/products',
            {
                name: this.name,
                price: this.price,
                discount: this.discount,
                first_img: this.first_image,
                second_img: this.second_image,
                category_id: this.$route.params.id,
                brand_id: this.brand_id
            },
            {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then((response) => {
                if(response.data.error){    
                    Swal.fire({
                        icon: 'error',
                        text: response.data.error,
                    });
                }
                else {                                                                      
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.data.success,
                    }).then(value => {
                        if(value.isConfirmed){
                            window.location.href = `/productsAdmin/${this.$route.params.id}`;
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        },

        async getBrands() {
            await axios.get('/api/brands')
                .then(response => {
                    this.brands = response.data.brands;
                }).catch(error => {
                    console.log(error);
                });
        },

        async getProduct() {
            await axios.get(`/api/products/${this.product_id}`)
                .then(response => {
                    this.name = response.data.product.name;
                    this.price = response.data.product.price;
                    this.discount = response.data.product.discount;
                    this.first_image = response.data.product.first_img;
                    this.first_image = this.first_image.replace('../images/', '');
                    this.second_image = response.data.product.second_img;
                    this.second_image = this.second_image.replace('../images/', '')
                    this.brand_id = response.data.product.brand_id;
                }).catch(error => {
                    console.log(error);
                });
        },

        async editProduct(e) {
            await axios.put(`/api/products/${this.product_id}`,
            {
                name: this.name,
                price: this.price,
                discount: this.discount,
                first_img: this.first_image,
                second_img: this.second_image,
                category_id: this.$route.params.id,
                brand_id: this.brand_id

            },
            {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then((response) => {
                if(response.data.error){    
                    Swal.fire({
                        icon: 'error',
                        text: response.data.error,
                    });
                }
                else {                                                                      
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.data.success,
                    }).then(value => {
                        if(value.isConfirmed){
                            window.location.href = `/productsAdmin/${this.$route.params.id}`;
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        },

        handleSubmit(e) {
            e.preventDefault();

            if (this.product_id) this.editProduct();
            else this.createProduct();
        }
    }
}
</script>