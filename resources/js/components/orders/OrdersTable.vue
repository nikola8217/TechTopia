<template>
    <div class="cart-page mt-100" style="margin-bottom: 100px">
        <div class="container">
            <div class="cart-page-wrapper">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <table class="cart-table w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Total price</th>
                                    <th>Status</th>
                                    <th style="text-align: right">Actions</th>
                                </tr>
                            </thead>
                
                            <tbody>
                                <tr class="cart-item" v-for="(order, index) in this.orders" :key="index">
                                    <td>
                                        {{ order.id }}
                                    </td>
                                    <td>
                                        {{ order.username }}                            
                                    </td>
                                    <td>
                                        {{ order.email }}
                                    </td>
                                    <td>
                                        {{ order.phone }}                            
                                    </td>
                                    <td>
                                        {{ order.address }}, {{ order.zip }} {{ order.city }}
                                    </td>
                                    <td>
                                        {{ order.country }}                            
                                    </td>
                                    <td>
                                        {{ order.price }}
                                    </td>
                                    <td>
                                        {{ order.name }}
                                    </td>
                                    <td>
                                        <div class="btn-group" style="float: right;">
                                            <button class="btn btn-primary" style="margin-right: 5px;" @click="orderDetails(order.id)">
                                                Details
                                            </button>
                                            <button class="btn btn-danger" @click="deleteOrder(order.id)">
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
    name: "OrdersTable",
    mounted() {
        this.getOrders();
    },
    data() {
        return {
            orders: []
        }
    },
    methods: {
        async getOrders() {
            await axios.get('/api/orders', {
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

        async deleteOrder(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/orders/${id}`, {
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
                        this.getOrders();
                    })
                    .catch(error => {
                        console.error(error);
                    });
                }
            });
        },
    }
}
</script>