<template>
    <div class="checkout-page mt-100" style="margin-bottom: 200px">
                <div class="container">
                    <div class="checkout-page-wrapper">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                                <div class="section-header mb-3">
                                    <h2 class="section-heading">Checkout</h2>
                                </div>
                                <div class="shipping-address-area">
                                    <h2 class="shipping-address-heading pb-1">Fill in with your details</h2>
                                    <div class="shipping-address-form-wrapper">
                                        <form action="#" class="shipping-address-form common-form">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Name</label>
                                                        <input type="text" v-model="name" :disabled="isDisabled" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Email</label>
                                                        <input type="email" v-model="email" :disabled="isDisabled" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Phone number</label>
                                                        <input type="text" v-model="phone" v-on:input="restrictToNumbers" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Address</label>
                                                        <input type="text" v-model="address" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Zip code</label>
                                                        <input type="text" v-model.number="zip" v-on:input="restrictToNumbers" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="labe l">City</label>
                                                        <input type="text" v-model="city" />
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label class="label">Country</label>
                                                        <input type="text" v-model="country"/>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="shipping-address-area billing-area" v-if="user_id && points >= 50">
                                    <h2 class="shipping-address-heading pb-1">You have enough points</h2>
                                    <div class="form-checkbox d-flex align-items-center mt-4">
                                        <input class="form-check-input mt-0" type="checkbox" @change="handleCheckboxChange">
                                        <label class="form-check-label ms-2">
                                            Use 20% discount
                                        </label>
                                    </div>
                                </div>
                                <div class="shipping-address-area billing-area">
                                    <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                        <a :href="$router.resolve({name: 'cart'}).href" class="minicart-btn btn-secondary">BACK TO CART</a>
                                        <a @click="order" class="checkout-page-btn minicart-btn btn-primary" style="cursor: pointer">ORDER NOW</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                                <div class="cart-total-area checkout-summary-area">
                                    <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h3>

                                    <div class="minicart-item d-flex" v-for="(product, index) in this.products" :key="index">
                                        <div class="mini-img-wrapper">
                                            <img class="mini-img" :src="product.img" alt="img">
                                        </div>
                                        <div class="product-info">
                                            <h2 class="product-title"><a href="#">{{ product.name }}</a></h2>
                                            <p class="product-vendor">{{ product.price }} RSD x {{ product.quantity }}</p>
                                        </div>
                                    </div>

                                    <div class="cart-total-box mt-4 bg-transparent p-0">
                                        <hr />
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Total:</h4>
                                            <p class="subtotal-value">{{ total }}</p>
                                        </div>
                                    </div>
                                </div>
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
    mounted() {
        this.calculateSubtotal();
        if (this.user_id) this.getUser();
    },
    data() {
        return {
            products: localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [],
            user_id: localStorage.getItem('user_id') ? localStorage.getItem('user_id') : null,
            total: 0,
            total_quantity: 0,
            name: '',
            email: '',
            phone: '',
            address: '',
            city: '',
            zip: '',
            country: '',
            points: '',
            havePoints: false,
            isDisabled: false,
        }
    },
    methods: {
        restrictToNumbers() {
            this.phone = this.phone.replace(/\D/g, '');
            this.zip = this.zip.replace(/\D/g, '');
        },

        calculateSubtotal() {
            if (this.products.length > 0) {
                const subtotal = this.products.reduce((total, product) => {
                    return total + product.quantity * product.price;
                }, 0);

                const qty = this.products.reduce((total, product) => {
                    return total + product.quantity;
                }, 0);

                this.total = subtotal.toFixed(2);
                this.total_quantity = qty;
            }
        },

        handleCheckboxChange(event) {
            if (event.target.checked) {
                this.total = this.total - this.total * 20/100;
                this.total = this.total.toFixed(2);
                this.havePoints = true;
            } else {
                this.calculateSubtotal();
                this.havePoints = false;
            }
        },

        async order() {
            await axios.post('api/orders', {
                name: this.name,
                email: this.email,
                phone: this.phone,
                address: this.address,
                zip: this.zip,
                city: this.city,
                country: this.country,
                points: this.havePoints,
                total_price: this.total,
                products: this.products,
                user_id: this.user_id
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
                            localStorage.removeItem('cart');
                            window.location.href = '/products';
                        }
                    });
                }                   
            }).catch((error) => {
                console.log(error);
            });
        },

        async getUser() {
            await axios.get(`/api/users/${this.user_id}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            }).then(response => {
                this.points = response.data.user.points;
                this.name = response.data.user.name;
                this.email = response.data.user.email;
                this.isDisabled = true;
            }).catch(error => {
                console.log(error);
            });
        },
    }
    
}
</script>