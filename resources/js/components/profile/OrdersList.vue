<template>
    <div class="checkout-page mt-30">
        <div class="container">
            <div class="checkout-page-wrapper">
                <h2 v-if="orders.length > 0">My orders</h2>
                <div class="row" v-for="(order, index) in this.orders" :key="index">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">

                        <div class="checkout-user-area overflow-hidden d-flex align-items-center">
                            <div class="checkout-user-details d-flex align-items-center justify-content-between w-100">
                                <div class="checkout-user-info">
                                    <h2 class="checkout-user-name">{{ order.username }}</h2>
                                    <p class="checkout-user-address mb-0">{{ order.email }}</p>
                                    <p class="checkout-user-address mb-0">{{ order.phone }}</p>
                                    <p class="checkout-user-address mb-0">{{ order.address }}, {{ order.zip }} {{ order.city }}, {{ order.country }}</p>
                                    <p class="checkout-user-address mb-0">{{ order.price }} RSD</p>
                                    <p class="checkout-user-address mb-0">{{ order.name }}</p>
                                </div>
                                
                                <button class="edit-user btn-secondary" @click="orderDetails(order.id)">DETAILS</button>
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

export default {
    name: "OrdersList",
    mounted() {
        this.getOrders();
    },
    data() {
        return {
            user_id: localStorage.getItem('user_id') ? localStorage.getItem('user_id') : null,
            orders: []
        }
    },
    methods: {
        async getOrders() {
            await axios.get(`/api/ordersUser/${this.user_id}`, {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem('token')}`
                }
            })
                .then(response => {
                    this.orders = response.data.orders;
                    this.orders = response.data.orders.map(order => ({
                        ...order,
                        price: order.price.toFixed(2)
                    }));
                })
                .catch(error => {
                    console.log(error);
                });
        },

        orderDetails(id) {
            window.location.href = `/orders/${id}`; 
        },
    },
}
</script>